<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class userFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->numberBetween(1, 100),
            'nom' => fake()->name,
            'email' => fake()->unique()->safeEmail,
            'mdp' => fake()->sha256(), // return hashed password
            'role' => fake()->jobTitle(),
        ];
    }
}
