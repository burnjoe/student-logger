<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

        Student::create([
            'student_no' => '2000222',
            'last_name' => 'Dela Cruz',
            'first_name' => 'Juan',
            'sex' => 'Male',
            'civil_status' => 'Single',
            'nationality' => 'Filipino',
            'birthdate' => now(),
            'birthplace' => 'Manila',
            'address' => 'Manila',
            'phone' => '09214435512',
            'email' => 'delacruzjuan@gmail.com',
            'account_type' => 'Cabuyeno',
            // 'program_id' => $program->id
        ]);

        Student::create([
            'student_no' => '2003211',
            'last_name' => 'Santos',
            'first_name' => 'Jose',
            'middle_name' => 'Moreno',
            'sex' => 'Male',
            'civil_status' => 'Single',
            'nationality' => 'Filipino',
            'birthdate' => now(),
            'birthplace' => 'Batangas',
            'address' => 'Batangas',
            'phone' => '09214434412',
            'email' => 'santosjose@gmail.com',
            'account_type' => 'Non-Cabuyeno',
            // 'program_id' => $program->id
        ]);

        Student::create([
            'student_no' => '2000321',
            'last_name' => 'Leonor',
            'first_name' => 'Josefa',
            'sex' => 'Female',
            'civil_status' => 'Single',
            'nationality' => 'Filipino',
            'birthdate' => now(),
            'birthplace' => 'Laguna',
            'address' => 'Laguna',
            'phone' => '09214215512',
            'email' => 'leonorjosefa@gmail.com',
            'account_type' => 'Cabuyeno',
            // 'program_id' => $program->id
        ]);


        // Calls out other seeder
        $this->call(EmployeeSeeder::class);
        $this->call(FamilyMemberSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
