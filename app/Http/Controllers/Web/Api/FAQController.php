<?php

namespace App\Http\Controllers\Web\Api;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index(){

        $faq = FAQ::with('translation')
            ->where('store_id' , \request('store_id' , 0))
            ->get();

        return responseApi('success' , '' , $faq);
    }
}
