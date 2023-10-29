<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Attendance;
use App\Models\User;
use App\Models\College;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $college = College::create([
            'name' => 'College of Computing Science'
        ]);

        $program = Program::create([
            'name' => 'Bachelor of Science in Computer Science',
            'college_id' => $college->id
        ]);

        // Calls out other seeder
        $this->call(PostSeeder::class);
        $this->call(StudentCardSeeder::class);
        $this->call(AttendanceSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(FamilyMemberSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
