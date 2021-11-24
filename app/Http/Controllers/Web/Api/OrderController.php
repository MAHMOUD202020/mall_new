<?php

namespace App\Http\Controllers\Web\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\OrderRequest;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Option;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{

    const COUNT_PAGINTION = 12;

    public function __construct()
    {
        $this->middleware('auth.guard:api');
    }

    public function getOrder(){

        $order = Order::with(['carts.translation' , 'shipping_address'])
            ->where('user_id' , auth()->id())
            ->where('id' ,  \request('order_id' , 0))
            ->first();

        if ($order) {

            return responseApi('success' ,'' , $order);
        }

        return responseApi('false' ,__('order not found'));
    }

    public function getCartsOrder(){

        $carts = Cart::where('user_id' , auth()->id())
            ->where('order_id' ,  '!=' , null)
            ->simplePaginate(self::COUNT_PAGINTION);


        return responseApi('success' , '' , $carts->items());
    }

    public function getOrders(){

        $orders = Order::where('user_id' , auth()->id())->simplePaginate(self::COUNT_PAGINTION);

        return responseApi('success','' , $orders->items());
    }

    public function saveOrder(Request $request){

        $validator = \Validator::make($request->all(), (new OrderRequest())->rules());

        if ($validator->fails())
            return responseApi('false' , $validator->errors()->all());

        if (!$store = Store::find($request->store_id))
            return responseApi('false' , __('store not found'));

        $carts = Cart::with(['options:id,attribute_id,quantity' , 'product:id,quantity'])
            ->whereNotInOrder()
            ->where('store_id' , $request->store_id)
            ->where('user_id' , auth()->id())
            ->select(['id' , 'store_id' , 'user_id' , 'price' , 'quantity' ,'product_id'])
            ->get();

        if (($cartsCount = $carts->sum('quantity')) <= 0)
            return responseApi(0 , __('not any product in cart'), '');


        if (!is_array($products = $this->checkQuantityProduct($carts)))
            return responseApi('false' , __('product quantity error') , $products);

        if (!is_array($options = $this->checkQuantityOptions($carts)))
            return responseApi('false' , __('option quantity error') , $options);


  ///////////////////////////// start save data //////////////////////////


        $this->updateQuantityProduct($products);

        $this->updateQuantityOptions($options);

        $shippingAddress = ShippingAddress::create(array_merge($request->except(['store_id', 'note', 'coupon' ,'coupon_code']), ['user_id' => auth()->id()]));

        $cartsPrice = $carts->sum('price');

        $discount = $this->coupon($request->coupon_code , $cartsPrice);

        $order = Order::create([
            'products_count' => $cartsCount,
            'order_price' => $cartsPrice,
            'shipping_price' => $store->shipping_charges,
            'discount' => $discount,
            'total_price' => ($cartsPrice + $store->shipping_charges) - $discount,
            'note' => $request->note,
            'coupon_code' => $discount > 0 ? $request->coupon_code :'',
            'user_id' => auth()->id(),
            'store_id' => $store->id,
            'shipping_address_id' => $shippingAddress->id,
        ]);

        Cart::whereIn('id', $carts->map->id->all())->update([
            'order_id' => $order->id
        ]);

        return responseApi('success' ,__('order create') , $order);
    }

    private function checkQuantityProduct($carts)
    {

        $products_quantity = [];

        foreach ($carts as $cart):

            $product = $cart->product;

            if (array_key_exists($product->id, $products_quantity)):
                $products_quantity[$product->id] = $cart->quantity + $products_quantity[$product->id];
            else:
                $products_quantity[$product->id] = $cart->quantity;
            endif;

            if($product->quantity < $products_quantity[$product->id])
                return $product;
        endforeach;

        return $products_quantity;

    }
    private function checkQuantityOptions($carts){

        $options_quantity = [];

        foreach($carts as $cart){

            foreach ($cart->options as $option):

                if (array_key_exists($option->id , $options_quantity)):
                    $options_quantity[$option->id] = ($options_quantity[$option->id] +  $cart->quantity);
                else:
                    $options_quantity[$option->id] = $cart->quantity;
                endif;

                if($option->quantity < $options_quantity[$option->id])
                    return $option;
            endforeach;

        }

        return  $options_quantity;
    }

    private function coupon($coupon_code , $order_price){

        if ($coupon_code) { // if find coupon


            $coupon = Coupon::where('code' , $coupon_code)
                ->whereDate('end_date' , '>=' , Carbon::now()->format('Y-m-d'))
                ->where('is_active' , 1)
                ->where('min_price' , '<=', $order_price)
                ->first();


            if ($coupon->limit_user <= $coupon->users()->where('user_id' , auth()->id())->count())
                return  0;


            if ($coupon && ($coupon->use < $coupon->limit)) {

                $coupon->users()->attach([auth()->id()]);

                if ($coupon->type_discount === "percentage"):

                    $discount = ( $order_price * $coupon->discount) / 100;

                    return ((integer)$discount > $order_price) ? $order_price : $discount;

                else:

                    $discount = $coupon->discount;

                    return ((integer)$discount > $order_price) ? $order_price : $discount;

                endif;


            }//end  if find coupon and use  not limit

            return  0;

        } // end if find coupon_code in request

        return 0;
    }


    private function updateQuantityProduct($products){

        $productSameValue = [];

        foreach ($products as $product_id => $quantity){

            if (in_array($quantity , $products , true)) {

                $productSameValue[$quantity][] = $product_id;

            }else{

                Product::where('id' , $product_id)->update([
                    'quantity' => \DB::raw("quantity-$quantity")
                ]);

            }
        }

        foreach ($productSameValue as $quantity_val => $products_id) {

         Product::whereIn('id', $productSameValue[$quantity_val])->update([
                'quantity' => \DB::raw("quantity-$quantity_val")
            ]);
        }
    }

    private function updateQuantityOptions($options){

        $optionsSameValue = [];

        foreach ($options as $option_id => $quantity){

            if (in_array($quantity , $options , true)) {

                $optionsSameValue[$quantity][] = $option_id;

            }else{

                Option::where('id' , $option_id)->update([
                    'quantity' => \DB::raw("quantity-$quantity")
                ]);

            }
        }

        foreach ($optionsSameValue as $quantity_val => $options_id) {

            Option::whereIn('id', $optionsSameValue[$quantity_val])->update([
                'quantity' => \DB::raw("quantity-$quantity_val")
            ]);
        }

    }

}
