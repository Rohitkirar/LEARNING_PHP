<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            "url" => fake()->randomElement(['817028.jpg' , '1263545.jpg' , '7902291.jpg' , '3111742.jpg' , '2302746.jpg' ]),
            
        ];
    }
}
