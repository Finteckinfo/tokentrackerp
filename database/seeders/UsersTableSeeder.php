<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Super Admin User
        User::create([
            'name' => 'Kipruto Rop',
            'email' => 'ropenock@gmail.com',
            'password' => Hash::make('password'), // You can change the password
            'role' => 'superadmin', // You can use a role or user_type field to distinguish between roles
            'created_at' => now(),
        ]);

        // Regular Admin User
        User::create([
            'name' => 'Julius Mutunkei',
            'email' => 'jayweb3@gmail.com',
            'password' => Hash::make('password'), // You can change the password
            'role' => 'admin', // Assign a different role
            'created_at' => now(),
        ]);

        User::create([
            'name' => 'Collins CE',
            'email' => 'collins@gmail.com',
            'password' => Hash::make('password'), // You can change the password
            'role' => 'admin', // Assign a different role
            'created_at' => now(),
        ]);


        User::create([
            'name' => 'Alex CE',
            'email' => 'alex@gmail.com',
            'password' => Hash::make('password'), // You can change the password
            'role' => 'admin', // Assign a different role
            'created_at' => now(),
        ]);
    }
}
