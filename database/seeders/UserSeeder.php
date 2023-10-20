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
            'profileable_id' => 1,
            'profileable_type' => Employee::class
        ])->assignRole('admin');

        User::create([
            'email' => 'derlajulius@gmail.com',
            'password' => bcrypt('password'),
            'status' => 'INACTIVE',
            'profileable_id' => 2,
            'profileable_type' => Employee::class
        ])->assignRole('librarian');

        User::create([
            'email' => 'delacruzjuan@gmail.com',
            'password' => bcrypt('password'),
            'status' => 'ACTIVE',
            'profileable_id' => 1,
            'profileable_type' => FamilyMember::class
        ])->assignRole('parent / guardian');

    }
}
