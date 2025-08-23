<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesOfficeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'location' => $this->faker->city(),
            'name' => $this->faker->name(),
            'manager_id' => null,
        ];
    }
}
