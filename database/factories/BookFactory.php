<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'author_id' => User::factory(),
            'publication_date' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'isbn' => $this->faker->unique()->isbn13,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
