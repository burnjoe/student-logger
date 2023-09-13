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
            'first_name' => 'Julius',
            'relationship' => 'Uncle',
            'occupation' => 'N/A',
            'phone' => '09217751256'
        ]);
    }
}
