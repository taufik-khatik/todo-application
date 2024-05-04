<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Admin',
            'email' => 'taufikkhatik.exr@gmail.com',
            'password' => bcrypt('Tmk#2024'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Taufik Khatik',
            'email' => 'taufikkhatik23@gmail.com',
            'password' => bcrypt('123456789'),
            'role' => 'employee',
        ]);
    }
}
