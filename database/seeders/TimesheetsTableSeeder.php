<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Timesheet;
use App\Models\User;

class TimesheetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check how many users currently exist
        $userCount = User::count();

        // If the user count is less than 5, create enough users to reach 25
        if ($userCount < 5) {
            $usersToCreate = 25 - $userCount; // Calculate how many users to create
            User::factory($usersToCreate)->create();
        }

        // Fetch all users to associate with timesheets
        $users = User::all();
        
        foreach ($users as $user) {
            Timesheet::create([
                'user_id'            => $user->id,
                'employee_name'      => $user->name,
                'task_id'            => 'T-'.rand(1000, 9999),
                'project'            => 'Project '.rand(1, 5),
                'approximated_hours' => rand(5, 20),
                'submitted_hours'    => rand(5, 20),
                'approved'           => rand(0, 1), // 0 = not approved, 1 = approved
                'status'             => rand(0, 1) ? 'paid' : 'unpaid',
            ]);
        }
    }
}
