<?php

namespace App\Http\Controllers\Web\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ShippingAddressRequest;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;

class ShippingAddressController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.guard:api');
    }


    public function index()
    {
        $shipping_addresses = auth()->user()
            ->shipping_addresses()
            ->get();

        return responseApi(
             count($shipping_addresses) > 0 ? 'success' : 'false',
            '',
             $shipping_addresses,
        );
    }


    public function save(Request $request){

        $validator = \Validator::make($request->all(), (new ShippingAddressRequest())->rules());

        if ($validator->fails()) {

            return responseApi(
                 'false',
                 $validator->errors()->all(),
            );
        }



        $ShippingAddress = ShippingAddress::create(
            array_merge($validator->validated() ,
                ['user_id' => auth()->id()])
        );

        return responseApi(
             'success',
            __('save shipping address success'),
             $ShippingAddress,
        );

    }

    public function update(Request $request){

        $validator = \Validator::make($request->all(), (new ShippingAddressRequest())->rules());

        if ($validator->fails()) {

            return responseApi(
                 'false',
                 $validator->errors()->all(),
            );
        }


        ShippingAddress::where('id' , $request->shippingAddress_id)
            ->where('user_id'  , auth()->id())
            ->update(array_merge($validator->validated() ,['user_id' => auth()->id()]));



        return responseApi('success', __('update shipping address success'));
    }

    public function delete(Request $request){

        ShippingAddress::where('id' , $request->shippingAddress_id)
            ->where('user_id'  , auth()->id())
            ->delete();

        return responseApi('success', __('delete shipping address success'));
    }



}
