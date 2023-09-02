<?php

namespace Database\Seeders;

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
            'password' => bcrypt('burnjoe25')
        ])->assignRole('admin');

        User::create([
            'name' => 'Julius Derla',
            'email' => 'derlajulius@gmail.com',
            'password' => bcrypt('password')
        ])->assignRole('parent');

    }
}