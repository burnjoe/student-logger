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
                ['BS in Psychology', 'BSP'],
            ],
            'College of Business, Accountancy, and Administration' => [
                ['BS in Accountancy', "BSA"],
                ['BS in Business Administration Major in Financial Management', "BSBA F"],
                ['BS in Business Administration Major in Marketing Management', "BSBA M"],
            ],
            'College of Computing Studies' => [
                ['BS in Information Technology', 'BSIT'],
                ['BS in Computer Science', "BSCS"],
            ],
            'College of Education' => [
                ['BS in Elementary Education', "BSEE"],
                ['BS in Secondary Education major in English', "BSSE E"],
                ['BS in Secondary Education major in Filipino', "BSSE F"],
                ['BS in Secondary Education major in Mathematics', "BSSE M"],
                ['BS in Secondary Education major in Social Studies', "BSSE S"],
            ],
            'College of Engineering' => [
                ['BS in Computer Engineering', 'BSCpE'],
                ['BS in Electronics Engineering', 'BSECE'],
                ['BS in Industrial Engineering', 'BSIE'],
            ],
            'College of Health and Allied Science' => [
                ['BS in Nursing', 'BSN'],
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
                    'name' => $program[0],
                    'abbreviation' => $program[1],
                    'college_id' => $college->id,
                ]);
            }
        }
    }
}
