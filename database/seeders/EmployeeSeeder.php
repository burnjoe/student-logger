<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'last_name' => 'Sabana',
            'first_name' => 'Joe Lawrence',
            'sex' => 'Male',
            'birthdate' => now(),
            'address' => 'Laguna',
            'phone' => '9212318882'
        ]);

        Employee::create([
            'last_name' => 'Derla',
            'first_name' => 'Julius',
            'sex' => 'Male',
            'birthdate' => now(),
            'address' => 'Laguna',
            'phone' => '9212448993'
        ]);
    }
}
