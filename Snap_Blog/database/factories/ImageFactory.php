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
            "url" => fake()->randomElement(["1RETqAUxtusEFXiu0s4WqcXTkEkPaVAnrKtyCa72.jpg" , "hj3A45d5uogO6575VClcXxtwMMiFJt5e0otVNwoe.jpg" , "J0OUyEtjXe1yUsBjMhozIJLiffGRQHxBxFMiv4tE.jpg"])
        ];
    }
}
