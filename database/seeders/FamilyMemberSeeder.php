<?php

namespace Database\Seeders;

use App\Models\FamilyMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilyMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FamilyMember::create([
            'last_name' => 'Derla',
            'first_name' => 'Rey',
            'relationship' => 'Father',
            'occupation' => 'Engineer',
            'phone' => '9217751251'
        ]);

        FamilyMember::create([
            'last_name' => 'Derla',
            'first_name' => 'Rea',
            'relationship' => 'Mother',
            'occupation' => 'House Wife',
            'phone' => '9217751252'
        ]);

        FamilyMember::create([
            'last_name' => 'Derla',
            'first_name' => 'Rea',
            'relationship' => 'Guardian',
            'specified_relationship' => 'Mother',
            'occupation' => 'House Wife',
            'phone' => '9217751252'
        ]);
    }
}
