<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Roles
        $parent = Role::factory()->create([
            'name' => 'Parent'
        ]);

        $admin = Role::factory()->create([
            'name' => 'Admin'
        ]);

        $guard = Role::factory()->create([
            'name' => 'Guard'
        ]);

        $librarian = Role::factory()->create([
            'name' => 'Librarian'
        ]);

        $nurse = Role::factory()->create([
            'name' => 'Nurse'
        ]);

        // Users
        User::factory()->create([
            'name' => 'Joy Sabana',
            'email' => 'joysabana@gmail.com',
            'role_id' => $parent->id,
            'password' => bcrypt('burnjoe')
        ]);

        User::factory()->create([
            'name' => 'Jholo Sabana',
            'email' => 'sabanajholo@gmail.com',
            'role_id' => $admin->id,
            'password' => bcrypt('burnjoe')
        ]);

    }
}
