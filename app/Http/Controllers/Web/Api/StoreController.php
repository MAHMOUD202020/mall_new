<?php

namespace App\Http\Controllers\Web\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Section;
use App\Models\Store;

class StoreController extends Controller
{


    const COUNT_PAGINTION = 5;

    public function getAllStores(){

       $stores =  Store::with('translation')
           ->orderBy('position_id')
           ->active()
           ->sort()
           ->customSelect()
           ->get();

        return responseApi('success' , '' , $stores);
    }

    public function getStoresPagination(){

       $stores = Store::with('translation')
           ->orderBy('position_id')
           ->active()
           ->sort()
           ->customSelect()
           ->simplePaginate(25);

        return responseApi('success' , '' , $stores->items());
    }

    public function singleStore(){


        $store = $this->store();

        if (!$store) { // is not found store

            return responseApi('false' , __('store not found'));
        };

        $sections = Section::where('store_id' , $store->id)->get();;

        $temporary_products = $this->getProductsId($sections);

        $products_id = $temporary_products['products_id'];

        $products_section = $temporary_products['products_section'];

        $products = $this->getAllProducts($products_id , $products_section);

        return responseApi('success' , '' , [
            'store' => $store,
            'sections' => $sections,
            'products' => $products,
        ]);
    }



    public function getProductsPagination(){

        $products = Product::with(['images' , 'attributes.options' , 'translation'])
            ->whereRelation('sections' , 'section_id' ,request('section_id' , 0))
            ->where('store_id' , request('store_id' , 0))
            ->customSelect()
            ->sort()
            ->active()
            ->simplePaginate(self::COUNT_PAGINTION);

        return responseApi('success' , '' , $products->items());
    }



//    public function singleStore(){
//
//
//        $store = Store::with('profile')
//            ->where('id' , \request('store_id' , 0))
//            ->active()
//            ->first();
//
//        $sections = Section::with([
//
//            'product' => function($q){
//                return $q->customSelect()
//                    ->active()
//                    ->withCustomTrans()
//                    ->with('images');
//            }
//        ])
//            ->where('store_id' , $store->id)
//            ->addSelect([
//                'last_product_id' => ProductSection::select('product_id')
//                    ->whereColumn('section_id', 'sections.id')
//                    ->latest()
//                    ->take(1)
//            ])
//            ->get();
//
//        return responseApi('success' , '' , [
//            'store' => $store,
//            'sections' => $sections
//        ]);
//    }



    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods clean code .............  ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    private function store(){

       return Store::with(['profile' , 'sliders'])
            ->where('id' , \request('store_id' , 0))
            ->active()
            ->first();

    }

    private function getProductsId($sections){

        $products_id = [];

        $products_section = [];

        foreach ($sections as $section) {

            $query = Product::whereRelation('sections' , 'section_id' , $section->id)
                ->select('id')
                ->sort()
                ->active()
                ->take(self::COUNT_PAGINTION)
                ->get();

            $query_map_id = $query->map->id->all();

            $products_section[$section->id] = $query_map_id;

            $products_id[] =$query_map_id;
        }

        return ['products_id' => \Arr::collapse($products_id) , 'products_section' => $products_section];
    }

    private function getAllProducts($products_id , $products_section){

        $productsGroup = [];

        $products = Product::with(['images' , 'attributes.options' , 'translation'])
            ->whereIn('id', $products_id )
            ->customSelect()
            ->sort()
            ->get();

        foreach ($products_section as $section => $array_products_id){

            $productsGroup[$section] = $products->whereIn('id' , $array_products_id);
        }

        return $productsGroup;
    }
}
