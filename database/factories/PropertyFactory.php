<?php

namespace Database\Factories;

use App\Models\SalesOffice;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'zip' => $this->faker->postcode(),
            'state' => $this->faker->state(),
            'title' => $this->faker->sentence(),
            'sales_office_id' => SalesOffice::factory(),
        ];
    }
}
