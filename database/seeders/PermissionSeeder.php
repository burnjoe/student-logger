<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view students']);
        Permission::create(['name' => 'create students']);
        Permission::create(['name' => 'edit students']);
        Permission::create(['name' => 'delete students']);
        
        Permission::create(['name' => 'manage students'])
        ->givePermissionTo([
            'view students',
            'create students',
            'edit students',
            'delete students',
        ]);
        
        Permission::create(['name' => 'view attendances']);
        Permission::create(['name' => 'view accounts']);
        Permission::create(['name' => 'view audit log']);
        Permission::create(['name' => 'view archive']);
    }
}
