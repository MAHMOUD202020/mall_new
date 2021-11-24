<?php

namespace App\Http\Controllers\Web\Api;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.guard:api');
    }


    public function checkCoupon(){


        $coupon = Coupon::where('code' , \request('coupon_code' , 0))->first();

        if ($coupon) {

            if ($coupon->limit_user <= $coupon->users()->where('user_id' , auth()->id())->count())
                return  responseApi( 'false',  'coupon use limit');

            if ($coupon->end_date < Carbon::now()->format('Y-m-d') || $coupon->is_active === 0)
                return  responseApi( 'false',  'coupon not found');

            if ($coupon->min_price > \request('order_price'))
                return  responseApi('false', 'The total price of the order must be at least ' . $coupon->min_price . ' IDR',);

            if ($coupon->use >= $coupon->limit)
                return  responseApi(
                    'false', 'The number of permitted use of the coupon . has been completed');

            return  responseApi('success', '', $coupon);

        }


        return  responseApi('false', 'coupon not found');


    }


}
