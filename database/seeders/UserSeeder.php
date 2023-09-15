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
            'name' => 'Jholo Sabana',
            'email' => 'sabanajholo@gmail.com',
            'password' => bcrypt('burnjoe25'),
            'status' => 1,
            'profileable_id' => 1,
            'profileable_type' => Employee::class
        ])->assignRole('admin');

        User::create([
            'name' => 'Julius Derla',
            'email' => 'derlajulius@gmail.com',
            'password' => bcrypt('password'),
            'status' => 1,
            'profileable_id' => 2,
            'profileable_type' => FamilyMember::class
        ])->assignRole('parent');

    }
}
