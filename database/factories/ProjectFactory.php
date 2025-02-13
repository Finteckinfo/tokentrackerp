<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'project_name' => $this->faker->words(3, true),
            'start_date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'client_name' => $this->faker->company,
            'deadline' => $this->faker->dateTimeBetween('now', '+6 months'),
            'project_type' => $this->faker->randomElement(['Internal', 'External']), // Added project type
            'status' => $this->faker->randomElement(['Incoming', 'In progress', 'On hold', 'Completed', 'Cancelled']), // Updated status values
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Project $project) {
            $employees = Employee::inRandomOrder()->take(rand(2, 5))->pluck('id'); // Select random employees
            $project->employees()->attach($employees); // Attach employees to project
        });
    }
}
