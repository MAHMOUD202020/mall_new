<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [

            'Color' => [
                [
                    'name_ar' => 'ابيض',
                    'name_en' => 'white',
                ],

                [
                    'name_ar' => 'اسود',
                    'name_en' => 'black',
                ],

                [
                    'name_ar' => 'ازرق',
                    'name_en' => 'blue',
                ],

                [
                    'name_ar' => 'احمر',
                    'name_en' => 'red',
                ],
            ],

            'Size' => [
                [
                    'name_ar' => 'S',
                    'name_en' => 'S',
                    'price' => 250,

                ],

                [
                    'name_ar' => 'M',
                    'name_en' => 'M',
                    'price' => 230,

                ],

                [
                    'name_ar' => 'L',
                    'name_en' => 'L',
                    'price' => 240,

                ],

                [
                    'name_ar' => 'XL',
                    'name_en' => 'XL',
                    'price' => 200,

                ],
            ],

            'Type' => [
                [
                    'name_ar' => 'جلد طبيعي',
                    'name_en' => 'Genuine leather',
                    'price' => 250,
                ],

                [
                    'name_ar' => 'جلد طبي',
                    'name_en' => 'Medical skin',
                    'price' => 300,
                ],

                [
                    'name_ar' => 'جلد صناعي',
                    'name_en' => 'Faux Leather',
                    'price' => 250,
                ],

                [
                    'name_ar' => 'شمواه',
                    'name_en' => 'Suede',
                    'price' => 0,
                ],
            ],

            'Additions' => [

                [
                    'name_ar' => 'عصير',
                    'name_en' => 'Soft drinks',
                    'price' => 2,
                ],

                [
                    'name_ar' => 'ثلج',
                    'name_en' => 'Ice',
                    'price' => 0.5,

                ],

                [
                    'name_ar' => 'كاتشب',
                    'name_en' => 'ketchup',
                    'price' => 3,

                ],

                [
                    'name_ar' => 'صلصلة',
                    'name_en' => 'Sauce',
                    'price' => 3,

                ],

                [
                    'name_ar' => 'خبز',
                    'name_en' => 'Bread',
                    'price' => 5,
                ],
            ],

        ];
        $attributes = Attribute::all(['id' , 'name_en']);

        foreach ($attributes as $attribute){

            $optionsNow = $options[$attribute->name_en];

          foreach ($optionsNow as  $option){

              Option::create(
                  array_merge($option , ['attribute_id' => $attribute->id])
              );
          }
        }
    }
}
