<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'role' => 'admin'
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@gmail.com',
                'password' => bcrypt('staff'),
                'role' => 'staff'
            ]
        ];

        User::insert($users);
    }
}
