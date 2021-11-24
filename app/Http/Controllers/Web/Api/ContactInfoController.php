<?php

namespace App\Http\Controllers\Web\Api;

use App\Http\Controllers\Controller;
use App\Models\StoreProfile;

class ContactInfoController extends Controller
{
    public function index(){

        $profile = StoreProfile::where('store_id' , \request('store_id' , 0))->get();

        return responseApi('success' , '' , $profile);
    }
}
