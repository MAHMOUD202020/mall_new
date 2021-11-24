<?php

namespace App\Http\Controllers\Web\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;

class FavoriteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.guard:api');
    }

    public function getMyProductsFavorite(){

        $products = Product::whereRelation('favorites', 'user_id' , auth()->id())
            ->withCustomTrans()
            ->latest()
            ->customSelect()
            ->simplePaginate(10);

        return responseApi('success', '' , $products->items());
    }

    public function getAllFavoriteId(){

        $favorites_id = Favorite::where('user_id' , auth()->id())->select('id')->get();

        return responseApi('success', '' , $favorites_id->map->id);
    }

    public function saveOrRemove(){


        $product = Product::where('id' , \request('product_id' , 0))->first();

        if (!$product) { // if product_id not found

            return responseApi('false', __('product not found'));
        }


        // get favorite to this product and this auth user
        $favorite = Favorite::where('product_id', \request('product_id'))
            ->where('user_id' , auth()->id())
            ->first();

        if ($favorite) { //  if  found favorite delete

            return  $this->favoriteDelete($favorite);
        }


        //  if  not found favorite create
        return  $this->favoriteCreate();
    }



    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods clean code .............  ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    private function favoriteDelete($favorite){

        $favorite->delete();

        Product::where('id', \request('product_id'))
            ->update([
                'favorite_count'=> \DB::raw('favorite_count-1'),
            ]);

        return responseApi('success', 'delete');
    }

    private function favoriteCreate(){


        Favorite::create([
            'product_id' => \request('product_id'),
            'user_id' => auth()->id(),
        ]);

        Product::where('id', \request('product_id'))
            ->update([
                'favorite_count' => \DB::raw('favorite_count+1'),
            ]);

        return responseApi('success', 'save');
    }
}
