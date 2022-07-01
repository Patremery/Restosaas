<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Review;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users_id = User::pluck('id');
        $restaurants_id = Restaurant::pluck('id');

        return [
            'user_id'           => $this->faker->randomElement($users_id),
            'restaurant_id'     => $this->faker->randomElement($restaurants_id),
            'comment'           => $this->faker->sentence(),
            'rating'            => $this->faker->randomFloat('1', '0', '5'),
        ];
    }
}
