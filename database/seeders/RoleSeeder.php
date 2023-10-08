<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        Role::create(['name' => 'admin'])
            ->syncPermissions([
                'view students',
                'create students',
                'edit students',
                'delete students',
                'view accounts',
                'view archive',
            ]);
            
        Role::create(['name' => 'guard']);
        Role::create(['name' => 'librarian']);
        Role::create(['name' => 'nurse']);
        Role::create(['name' => 'parent']);
        Role::create(['name' => 'guardian']);
    }
}
