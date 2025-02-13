<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // Generate 50 dummy projects
        Project::factory()->count(10)->create();
    }
}
