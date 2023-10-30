<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creates student and card records
        Card::factory(1000)->create();

        $student = Student::create([
            'student_no' => 2000294,
            'last_name' => 'Derla',
            'first_name' => 'Julius',
            'middle_name' => 'Alcances',
            'sex' => 'Male',
            'civil_status' => 'Single',
            'nationality' => 'Filipino',
            'birthdate' => Carbon::parse('2001-04-15'),
            'birthplace' => 'Cabuyao, Laguna',
            'address' => 'Mamatid, Cabuyao, Laguna',
            'phone' => '9214219512',
            'email' => 'jderl@gmail.com',
            'account_type' => 'Cabuyeño',
        ]);

        Card::factory()->create([
            'rfid' => 3207181875,
            'student_id' => $student->id,
            'expires_at' => now(),
        ]);

        $student = Student::create([
            'student_no' => 2011254,
            'last_name' => 'Ferreras',
            'first_name' => 'Vince Austin',
            'middle_name' => 'Romero',
            'sex' => 'Male',
            'civil_status' => 'Single',
            'nationality' => 'Filipino',
            'birthdate' => Carbon::parse('2002-01-24'),
            'birthplace' => 'Cabuyao, Laguna',
            'address' => 'Mamatid, Cabuyao, Laguna',
            'phone' => '9182371234',
            'email' => 'ferrerasvinceaustin@gmail.com',
            'account_type' => 'Cabuyeño',
        ]);

        Card::factory()->create([
            'rfid' => 3444330862,
            'student_id' => $student->id,
            'expires_at' => now(),
        ]);
    }
}