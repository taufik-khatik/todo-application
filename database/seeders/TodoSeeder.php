<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Todos
        Todo::create([
            'title' => 'Sample Todo 1',
            'description' => 'This is a sample todo item.',
            'status' => 'open',
            'user_id' => 1, // Assign the todo to an existing user (e.g., admin)
            'created_by' => 1, // Assign the todo to an existing user (e.g., admin)
            'updated_by' => 1, // Assign the todo to an existing user (e.g., admin)
        ]);

        Todo::create([
            'title' => 'Sample Todo 2',
            'description' => 'Another sample todo item.',
            'status' => 'in_progress',
            'user_id' => 2, // Assign the todo to an existing user (e.g., employee)
            'created_by' => 1, // Assign the todo to an existing user (e.g., admin)
            'updated_by' => 1, // Assign the todo to an existing user (e.g., admin)
        ]);

        Todo::create([
            'title' => 'Sample Todo 3',
            'description' => 'Yet another sample todo item.',
            'status' => 'completed',
            'user_id' => 1, // Assign the todo to an existing user (e.g., admin)
            'created_by' => 1, // Assign the todo to an existing user (e.g., admin)
            'updated_by' => 1, // Assign the todo to an existing user (e.g., admin)
        ]);
    }
}
