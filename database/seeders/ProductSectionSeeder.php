<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Store;
use Illuminate\Database\Seeder;

class ProductSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $stores = Store::all();

        foreach ($stores as $store){


            foreach ($store->products as $product){

                $product->sections()->attach([$store->sections->random()->id]);
            }
        }
    }
}
