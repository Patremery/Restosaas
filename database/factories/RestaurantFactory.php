<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'            => $this->faker->company(),
            'logo'            => $this->faker->imageUrl(),
            'category'        => $this->faker->randomElement(['chinois', 'traditionnel', 'exotique']),
            'featured_image'  => $this->faker->imageUrl(),
            'city'            => $this->faker->city(),
            'address'         => $this->faker->address(),
            'phone'           => $this->faker->phoneNumber(),
            'website'         => $this->faker->url(),
            'menu'            => $this->faker->sentence(),
            'opened'          => $this->faker->boolean(),
            'schedule'        => $this->faker->randomElement($array = ['8h-18h', '10h-20h', '13h-20h']),
            'description'     => $this->faker->paragraph(),
        ];
    }
}
