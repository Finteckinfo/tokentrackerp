<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'employee_id' => $this->faker->unique()->regexify('[A-Z]{5}[0-9]{3}'), // Random unique ID
            'profile_picture' => $this->faker->imageUrl(50, 50, 'people'),
            'full_name' => $this->faker->name,
            'designation' => $this->faker->jobTitle,
            'department' => $this->faker->randomElement(['Engineering', 'Marketing', 'Finance', 'Sales']),
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Other']),
            'work_anniversary' => $this->faker->date(),
            'date_of_birth' => $this->faker->date(),
            'supervisor' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail, // New email field
            'country' => $this->faker->country,            // New country field
            'about' => $this->faker->paragraph,
            'employment_type' => $this->faker->randomElement(['Full-Time', 'Part-Time', 'Contractor']),
            'passport_id' => $this->faker->unique()->bothify('???-####-###'),
        ];
    }
}
