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
        // Manage Student Information
        Permission::create(['name' => 'view students']);
        Permission::create(['name' => 'create students']);
        Permission::create(['name' => 'edit students']);
        Permission::create(['name' => 'archive students']);
        Permission::create(['name' => 'restore students']);
        Permission::create(['name' => 'delete students']);

        Permission::create(['name' => 'manage students'])
            ->givePermissionTo([
                'view students',
                'create students',
                'edit students',
                'archive students',
                'restore students',
                'delete students',
            ]);

        // Manage User Accounts
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'archive users']);
        Permission::create(['name' => 'restore users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'manage users'])
            ->givePermissionTo([
                'view users',
                'create users',
                'edit users',
                'archive users',
                'restore users',
                'delete users',
            ]);

        // Manage Attendances
        Permission::create(['name' => 'view attendances']);
        Permission::create(['name' => 'log attendances']);
        
        Permission::create(['name' => 'manage attendances'])
            ->givePermissionTo([
                'view attendances',
                'log attendances',
            ]);

        // Other Permissions
        Permission::create(['name' => 'view audit log']);
        Permission::create(['name' => 'view archive']);
    }
}
