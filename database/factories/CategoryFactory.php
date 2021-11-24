<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
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
                'name' => 'Ar_'.$this->faker->word,
            ],

            'en'=>[
                'name' => 'En_'.$this->faker->word,
            ],

            'sort' => random_int(1 , 20),
            'icon' => random_int(1 , 4).'.jpg',
        ];
    }
}
