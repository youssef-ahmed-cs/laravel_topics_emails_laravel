<?php

namespace Database\Factories;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    protected $model = Flight::class;

    public function definition(): array
    {
        return [
            'destination' => $this->faker->city,
            'flight_number' => $this->faker->unique()->bothify('??###'),
            'airline' => $this->faker->company,
            'departure_time' => $this->faker->dateTimeBetween('now', '+1 year'),
            'arrival_time' => $this->faker->dateTimeBetween('+1 hour', '+2 years'),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed'])
        ];
    }
}
