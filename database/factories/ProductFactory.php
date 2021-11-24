<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'ar'=>[
                'name' => 'Ar_'.$this->faker->text(90),
                'description' => 'Ar_'.$this->faker->realTextBetween(1000 , 10000 ),
            ],

            'en'=>[
                'name' => 'En_'.$this->faker->text(90),
                'description' => 'En_'.$this->faker->realTextBetween(1000 , 10000 ),
            ],

            'img'   => random_int(1 , 5).'.jpg',
            'price' => random_int(100, 500),
            'is_active' => random_int(0 ,1),
            'favorite_count' => random_int(1000 ,10000),
            'store_id' => Store::inRandomOrder()->first()->id
        ];
    }

    public function configure()
    {
        $path = 'assets/images/product/gallery/';
        $img = $this->faker->image(public_path($path), 1200  ,   800, 'product' );
        $imgName = explode('\\' ,$img);
        $imgName = end($imgName);

        return $this->afterCreating(function (Product $product) use ($imgName){

            $path = 'assets/images/product/gallery/';
            $img = $this->faker->image(public_path($path), 1200  ,   800, 'product' );
            $imgName = explode('\\' ,$img);
            $imgName = end($imgName);

            ProductImages::create([
                'name' => $imgName,
                'store_id' => $product->store_id,
                'product_id' => $product->id,
            ]);

            $img = $this->faker->image(public_path($path), 1200  ,   800, 'product' );
            $imgName = explode('\\' ,$img);
            $imgName = end($imgName);

            ProductImages::create([
                'name' => $imgName,
                'store_id' => $product->store_id,
                'product_id' => $product->id,
            ]);

            $img = $this->faker->image(public_path($path), 1200  ,   800, 'product' );
            $imgName = explode('\\' ,$img);
            $imgName = end($imgName);

            ProductImages::create([
                'name' => $imgName,
                'store_id' => $product->store_id,
                'product_id' => $product->id,
            ]);
        });
    }
}
