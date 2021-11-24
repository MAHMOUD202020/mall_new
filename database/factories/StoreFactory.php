<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StoreFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ar' => [
                'name' => "Ar_".$this->faker->userName,
                'welcome_message' => "Ar_".$this->faker->text(),
            ],

            'en' => [
                'name' => "En_".$this->faker->userName,
                'welcome_message' => "En_".$this->faker->text(),
            ],
            'email' => $this->faker->unique()->safeEmail,
            'logo' => random_int(1 , 5).'.png',
            'shipping_charges' => random_int(30 , 100),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Store $store) {
            //
        })->afterCreating(function (Store $store) {

            $store->profile()->create([
                'banner' => 'default.jpg',
                'phone' => $this->faker->phoneNumber,
                'phone2' => $this->faker->phoneNumber,
                'email_contact' => $this->faker->email,
                'facebook' => $this->faker->url,
                'instagram' => $this->faker->url,
                'twitter' => $this->faker->url,
                'whatsapp' => $this->faker->phoneNumber,
            ]);
        });
    }
}
