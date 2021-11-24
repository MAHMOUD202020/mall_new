<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Store;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
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

            $names = ['ملابس اطفال', 'ملابس رجال', 'ملابس نساء', 'احذيه رجالي', 'احذيه حريمي', 'شنط', 'نظارات', 'ساعات', 'اكسسورات'];

            $walls = ['right',  'left', 'center'];

            $wallNumber = 0;

            $loopWall = 1;

            $sort = 1;

            foreach ($names as $name){

                Section::create([

                    'name' => $name,
                    'sort' => $sort,
                    'wall' => $walls[$wallNumber],
                    'is_slider' => false,
                    'is_active' => true,
                    'store_id' => $store->id
                ]);

                $sort++;

                $wallNumber === 2 ? $wallNumber = 0 : '';
                $wallNumber++;

                $loopWall++;
                $loopWall >= 3 ? $loopWall = 1 : '';
            }
        }
    }
}
