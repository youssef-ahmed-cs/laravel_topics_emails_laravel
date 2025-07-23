<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['John Doe', 'Jane Smith', 'Alice Johnson', 'Bob Brown']),
            'country' => fake()->randomElement(['USA', 'Canada', 'UK', 'Australia', 'Germany']),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'user_id' => fake()->numberBetween(1, 50),
        ];
    }
}
