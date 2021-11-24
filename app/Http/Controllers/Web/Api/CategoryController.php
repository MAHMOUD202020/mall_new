<?php

namespace App\Http\Controllers\Web\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Store;


class CategoryController extends Controller
{


    const COUNT_PAGINTION = 12;

    public function getAllCategories(){

        $categories = $this->categories();

        $stores = $this->getAllStores($categories);

        return responseApi('success', '' , [
            "categories" => $categories,
            "stores" => $stores,
        ]);
    }

    public function getStoresPagination(){

        $stores = Store::where('category_id' , request('category_id' ,0))
            ->active()
            ->sort()
            ->customSelect()
            ->simplePaginate(self::COUNT_PAGINTION);

        return responseApi('success' , '' , $stores->items());
    }



    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods clean code .............  ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    private function categories(){

       return Category::with('translation')
            ->sort()
            ->customSelect()
            ->get();
    }


    public function getAllStores($categories){

        $processing_stores_id = $this->getStoresId($categories);

        $stores_id = $processing_stores_id['all_id'];

        $stores_id_group_by_category = $processing_stores_id['group_id'];

        $stores = Store::with('translation')
            ->whereIn('id', $stores_id )
            ->customSelect()
            ->sort()
            ->get();

        foreach ($stores_id_group_by_category as $category => $array_stores_id){

            $storesGroup[$category] = $stores->whereIn('id' , $array_stores_id);
        }

        return $storesGroup;
    }

    private function getStoresId($categories){

        $stores_id = [];

        $stores_category = [];

        foreach ($categories as $category) {

            $query = Store::where('category_id' , $category->id)
                ->active()
                ->sort()
                ->select('id')
                ->take(self::COUNT_PAGINTION)
                ->get();

            $query_map_id = $query->map->id->all();

            $stores_category[$category->id] = $query_map_id;

            $stores_id[] = $query_map_id;
        }

        return ['all_id' => \Arr::collapse($stores_id) , 'group_id' => $stores_category];
    }

}
