<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\SalesOffice;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [

            'name' => $this->faker->name(),
            'sales_office_id' => SalesOffice::factory(),
        ];
    }
}
