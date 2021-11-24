<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Slider;
use App\Models\Store;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = Store::all();

        foreach ($stores as $store) {

            for ($x = 0; $x <= 3; $x++) {

                Slider::create([
                    'src' => random_int(1, 7) . 'jpg',
                    'type' => 'img',
                    'wall' => 'center',
                    'sort' => random_int(1, 7),
                    'store_id' => $store->id
                ]);
            }
        }
    }
}
