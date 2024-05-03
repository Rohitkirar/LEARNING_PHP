<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'gender' => fake()->randomElement(['male' , 'female' , 'other']),
            'date_of_birth' => fake()->dateTimeBetween("-100 years" , "-18 years")->format("Y-m-d"),
            'email' => fake()->unique()->safeEmail(),
            "phone_number" => fake()->unique()->phoneNumber(),
            "username" => fake()->unique()->userName(),
            'email_verified_at' => now(),
            'password' => Hash::make("12345678"), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
