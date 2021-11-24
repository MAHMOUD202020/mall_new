<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

//        Store::factory(10)->create();
//        Product::factory(1000)->create();
//        $this->call(SectionSeeder::class);
//        $this->call(ProductSectionSeeder::class);
        $this->call(SliderSeeder::class);
//        $this->call(AttributeSeeder::class);
//        Category::factory(10)->create();
//        $this->call(CategorySeeder::class);
//        $this->call(FAQSeder::class);
//        $this->call(BoardSeeder::class);
    }
}
