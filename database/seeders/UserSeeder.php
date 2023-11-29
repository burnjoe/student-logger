<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use App\Models\FamilyMember;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleNames = Role::pluck('name')->all();

        User::factory(10)->create();

        $users = User::all();

        foreach ($users as $user) {
            $user->assignRole(fake()->randomElement($roleNames));
        }

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
