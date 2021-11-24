<?php

namespace App\Http\Controllers\Web\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\CartRequest;
use App\Models\Attribute;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $options_id;

    public function __construct()
    {
        $this->middleware('auth.guard:api');
    }

    public function getCarts(){

        $carts = Cart::with('translation')
            ->where('user_id' , auth()->id())
            ->whereNotInOrder()
            ->where('store_id' , \request('store_id' , 0))
            ->get();

        return responseApi('success' ,'' , $carts);
    }

    public function saveCart(Request $request){

        $validator = \Validator::make($request->all(), (new CartRequest())->rules());

        if ($validator->fails()) {

            return responseApi('false' , $validator->errors()->all());
        }

        $product = $this->product($request);

        if (!$product)
            return responseApi('false' , __('product not found'));

        // check product quantity
        if ($product->quantity < $request->quantity || $request->quantity <= 0)
            return responseApi('false' , __('product quantity error'));



            // start attributes
            $attributes = $this->attributes($request, $product);

            if ($attributes['status'])
                $attributes = $attributes['data'];
            else
                return responseApi('false', __($attributes['error_message']) , $attributes['option']);
            // end attributes

            // check options quantity
            if ($this->checkQuantityOptions($options = $attributes->map->options, $request->quantity) === 'error')
                return responseApi('false', __('option quantity error'));

        // cart create
        $cart = Cart::create([
            'ar' => ['name' => $product->translate('ar')->name],
            'en' => ['name' => $product->translate('en')->name],
            'quantity' => $request->quantity,
            'price' => $this->endPrice($attributes , $options , $product),
            'img' => $product->img,
            'attributes' => $attributes,
            'product_id' => $product->id,
            'user_id' => auth()->id(),
            'store_id' => $request->store_id,
        ]);


        if (count($attributes)) {

            $cart->options()->attach($this->options_id);
        }

        return responseApi('success' , __('cart create') , $cart);
    }

    public function updateQuantityCart(){

        $quantity = (integer) \request('quantity');

        $cart = Cart::with(['product' ,'options'])
            ->where('id' , \request('cart_id' , 0))
            ->where('user_id' , auth()->id())
            ->where('store_id' , \request('store_id' , 0))
            ->whereNotInOrder()
            ->first();

        if (!$cart)
            return responseApi('false' , __('cart not found'));


        $product = $cart->product;

        $options = $cart->options;

        // check product quantity
        if ($product->quantity < $quantity || $quantity <= 0)
            return responseApi('false' , __('product quantity error'));

        // check options quantity
        if ($options->count()) {
            if ($this->checkQuantityOptions($options , $quantity)  === 'error')
                return responseApi('false' , __('option quantity error'));
        }


        $cart->update([
            'quantity' => $quantity
        ]);

        return responseApi('success' ,'cart update' , $cart);
    }


    public function deleteCart(){

        $cart = Cart::where('id' , \request('cart_id' , 0))
             ->where('user_id' , auth()->id())
             ->where('store_id' , \request('store_id' , 0))
             ->whereNotInOrder()
             ->delete();

        return responseApi('success' , __('cart delete') , $cart);
    }

    public function clear(){


       $carts = Cart::where('user_id' , auth()->id())
            ->where('store_id' , \request('store_id' , 0))
           ->whereNotInOrder()
           ->delete();

        return responseApi('success' , __('cart clear') , $carts);
    }


    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods clean code .............  ////
    ////                                               ////
    ///////////////////////////////////////////////////////



    private function product($request){

        return Product::with(['attributes.options'])
            ->active()
            ->where('id' , $request->product_id)
            ->where('store_id', $request->store_id)
            ->where('is_active', 1)
            ->first();
    }

    private function attributes($request , $product){

        // start get attributes with options

        $this->options_id = explode(',', $request->get('options' , 0));

        $attributes = Attribute::with(['options' => function($q){
            return $q->whereIn('id', $this->options_id);
        }])
            ->where('product_id' , $product->id)
            ->get();

        // end get attributes with options

        // start validation attributes and options

        if ($attributes->count() > 0) {

            if ($attributes->where('type', 1)->count() > 1)
                return ['status' => false, 'error_message' => 'attribute change error' , 'option' => ''];

            foreach ($attributes as $attribute) {

                if ($attribute->options->count() > 1)
                    return ['status' => false, 'error_message' => 'attribute options count error', 'option' => $attribute->option];

                if ($attribute->is_required == 1 && $attribute->options->count() < 1)
                    return ['status' => false, 'error_message' => 'attribute required' , 'option' => $attribute->option];

            } // end foreach
        }
        // end attributes and options

        return  ['status' => true , 'data' => $attributes];
    }

    private function endPrice($attributes , $options , $product){

        $price = $product->sael_price > 0
            ? $product->sael_price
            : $product->regular_price;

        if (count($options) > 0) {

            if ($options->collapse()->count() > 0):

                $attrReplacePrice = $attributes->where('type', 1)->first();

                $attrReplacePrice ? $price = $attrReplacePrice->options->first()->price : '';

                foreach ($attributes->where('type', 2) as $attribute) {

                    foreach ($attribute->options as $option):
                        $price += $option->price;
                    endforeach;

                }

            endif;
        }

        return $price;
    }

    private function checkQuantityOptions($options , $cart_quantity){

        foreach ($options as $option){

            if ($option->first()) {

                if ($option->first()->quantity < $cart_quantity)
                    return 'error';
            }
        }

        return  true;
    }
}
