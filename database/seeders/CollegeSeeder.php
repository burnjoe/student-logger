<?php

namespace Database\Seeders;

use App\Models\College;
use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'College of Arts and Sciences' => [
                'BS in Psychology',
            ],
            'College of Business, Accountancy, and Administration' => [
                'BS in Accountancy',
                'BS in Business Administration Major in Financial Management',
                'BS in Business Administration Major in Marketing Management',
            ],
            'College of Computing Studies' => [
                'BS in Information Technology',
                'BS in Computer Science',
            ],
            'College of Education' => [
                'BS in Elementary Education',
                'BS in Secondary Education major in English',
                'BS in Secondary Education major in Filipino',
                'BS in Secondary Education major in Mathematics',
                'BS in Secondary Education major in Social Studies',
            ],
            'College of Engineering' => [
                'BS in Computer Engineering',
                'BS in Electronics Engineering',
                'BS in Industrial Engineering',
            ],
            'College of Health and Allied Science' => [
                'BS in Nursing',
            ],
        ];

        $abbreviations = [
            'College of Arts and Sciences' => 'CAS',
            'College of Business, Accountancy, and Administration' => 'CBAA',
            'College of Computing Studies' => 'CCS',
            'College of Education' => 'COED',
            'College of Engineering' => 'COE',
            'College of Health and Allied Science' => 'CHAS',
        ];

        foreach ($names as $collegeName => $programs) {
            $college = College::create([
                'name' => $collegeName,
                'abbreviation' => $abbreviations[$collegeName],
            ]);

            foreach ($programs as $program) {
                Program::create([
                    'name' => $program,
                    'college_id' => $college->id,
                ]);
            }
        }
    }
}
