<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Calls out other seeder
        $this->call(CollegeSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(FamilyMemberSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(AttendanceSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
