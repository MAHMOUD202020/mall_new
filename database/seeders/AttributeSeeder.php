<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attrs = [
            [
                'name_ar' => 'اللون',
                'name_en' => 'Color',
                'is_required' => 0,
                'type' => 0
            ],

            [
                'name_ar' => 'الحجم',
                'name_en' => 'Size',
                'is_required' => 1,
                'type' => 1
            ],

            [
                'name_ar' => 'النوع',
                'name_en' => 'Type',
                'is_required' => 1,
                'type' => 1
            ],

            [
                'name_ar' => 'اضافات الطلب',
                'name_en' => 'Additions',
                'is_required' => 0,
                'type' => 2

            ],

        ];

        $products = Product::all(['id']);

        foreach ($products as $product){

            Attribute::Create(
                array_merge($attrs[random_int(0 , 3)] , ['product_id' => $product->id])
            );

        }
    }
}
