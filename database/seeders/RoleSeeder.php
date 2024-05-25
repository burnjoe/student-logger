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
        Role::create(['name' => 'super admin'])
            ->syncPermissions([
                'view students',
                'create students',
                'edit students',
                'archive students',
                'restore students',
                'delete students',
                'view rfids',
                'issue rfids',
                'view issues',
                'view users',
                'create users',
                'edit users',
                'archive users',
                'restore users',
                'delete users',
                'view attendances',
                'log attendances',
                'view audit logs',
                'view archives',
                'view main gate reports',
                'view library reports',
                'view clinic reports',
                'generate reports',
            ]);

        Role::create(['name' => 'admin'])
            ->syncPermissions([
                'view students',
                'create students',
                'edit students',
                'view rfids',
                'issue rfids',
                'view issues',
                'view attendances',
                'log attendances',
                'view main gate reports',
                'generate reports',
            ]);

        Role::create(['name' => 'guard'])
            ->syncPermissions([
                'view attendances',
                'log attendances',
                'view main gate reports',
                'generate reports',
            ]);

        Role::create(['name' => 'librarian'])
            ->syncPermissions([
                'view attendances',
                'log attendances',
                'view library reports',
                'generate reports',
            ]);

        Role::create(['name' => 'nurse'])
            ->syncPermissions([
                'view attendances',
                'log attendances',
                'view clinic reports',
                'generate reports',
            ]);;
    }
}
