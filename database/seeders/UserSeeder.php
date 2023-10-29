<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\FamilyMember;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'sabanajholo@gmail.com',
            'password' => bcrypt('burnjoe25'),
            'status' => 'ACTIVE',
            'employee_id' => 1,
        ])->assignRole('admin');

        User::create([
            'email' => 'derlajulius@gmail.com',
            'password' => bcrypt('password'),
            'status' => 'INACTIVE',
            'employee_id' => 2,
        ])->assignRole('librarian');
    }
}
