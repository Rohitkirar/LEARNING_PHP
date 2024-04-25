<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            //
            
            "category_id" => fake()->numberBetween(1 , 12),
            "user_id" => fake()->numberBetween(9 , 100),
            "title" => fake()->text(30),
            "content" =>fake()->text(1000),
            

        ];

    }
}
