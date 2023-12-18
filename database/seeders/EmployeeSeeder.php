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
            'birthdate' => '2002-11-25',
            'address' => 'Laguna',
            'phone' => '9212318882'
        ]);

        Employee::factory(4)->create([
            'address' => 'Cabuyao, Laguna',
            'phone' => '9212448993'
        ]);
    }
}
