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
            'first_name' => 'Jholo',
            'sex' => 'Male',
            'birthdate' => now(),
            'address' => 'Laguna',
            'phone' => '09212318882'
        ]);
    }
}
