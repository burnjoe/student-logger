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
        // Card::factory(8)->create();

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

        Card::create([
            'rfid' => '0515641249',
            'student_id' => $student->id,
            'profile_photo' => 'photos\1.Derla.png',
            'issuance_reason' => 'First Issue',
            'expires_at' => now()->addYears(2),
            'contact_person_id' => 1,
            'status' => 'ACTIVE',
        ]);

        $student->family_members()->attach([1]);

        // $student = Student::create([
        //     'student_no' => 2011254,
        //     'last_name' => 'Ferreras',
        //     'first_name' => 'Vince Austin',
        //     'middle_name' => 'Romero',
        //     'sex' => 'Male',
        //     'civil_status' => 'Single',
        //     'nationality' => 'Filipino',
        //     'birthdate' => Carbon::parse('2002-01-24'),
        //     'birthplace' => 'Cabuyao, Laguna',
        //     'address' => 'Mamatid, Cabuyao, Laguna',
        //     'phone' => '9182371234',
        //     'email' => 'ferrerasvinceaustin@gmail.com',
        //     'account_type' => 'Cabuyeño',
        // ]);

        // Card::create([
        //     'rfid' => '3448217731',
        //     'student_id' => $student->id,
        //     'profile_photo' => 'photos\2.Vince.png',
        //     'issuance_reason' => 'First Issue',
        //     'expires_at' => now()->addYears(2),
        //     'status' => 'ACTIVE',
        // ]);

        // $student = Student::create([
        //     'student_no' => 2011253,
        //     'last_name' => 'Naparan',
        //     'first_name' => 'Cecilio',
        //     'middle_name' => 'Mancanes',
        //     'sex' => 'Male',
        //     'civil_status' => 'Single',
        //     'nationality' => 'Filipino',
        //     'birthdate' => Carbon::parse('2001-01-18'),
        //     'birthplace' => 'Cabuyao, Laguna',
        //     'address' => 'Banay-Banay, Cabuyao, Laguna',
        //     'phone' => '9924091282',
        //     'email' => 'naparancecilio82@gmail.com',
        //     'account_type' => 'Cabuyeño',
        // ]);

        // Card::create([
        //     'rfid' => '3444330823',
        //     'student_id' => $student->id,
        //     'profile_photo' => asset('img/user_icon.png'),
        //     'issuance_reason' => 'First Issue',
        //     'expires_at' => now()->addYears(2),
        //     'status' => 'ACTIVE',
        // ]);

        // $student = Student::create([
        //     'student_no' => 2000364,
        //     'last_name' => 'Sabana',
        //     'first_name' => 'Joe Lawrence',
        //     'middle_name' => 'Morena',
        //     'sex' => 'Male',
        //     'civil_status' => 'Single',
        //     'nationality' => 'Filipino',
        //     'birthdate' => Carbon::parse('2002-11-25'),
        //     'birthplace' => 'Cabuyao, Laguna',
        //     'address' => 'Mamatid, Cabuyao, Laguna',
        //     'phone' => '9213215231',
        //     'email' => 'sabanajoelawrence64@gmail.com',
        //     'account_type' => 'Cabuyeño',
        // ]);

        // Card::create([
        //     'rfid' => '0855806691',
        //     'student_id' => $student->id,
        //     'profile_photo' => 'photos\3.SABANA.png',
        //     'issuance_reason' => 'First Issue',
        //     'expires_at' => now()->addYears(2),
        //     'status' => 'ACTIVE',
        // ]);

        // $student = Student::create([
        //     'student_no' => 2000364,
        //     'last_name' => 'Batarao',
        //     'first_name' => 'Joshua',
        //     'middle_name' => 'Morena',
        //     'sex' => 'Male',
        //     'civil_status' => 'Single',
        //     'nationality' => 'Filipino',
        //     'birthdate' => Carbon::parse('2002-06-04'),
        //     'birthplace' => 'Cabuyao, Laguna',
        //     'address' => '477 Rumba Street Barangay Sala Cabuyao Laguna',
        //     'phone' => '9484719729',
        //     'email' => 'bataraojoshua39@gmail.com',
        //     'account_type' => 'Cabuyeño',
        // ]);

        // Card::create([
        //     'rfid' => '3000525264',
        //     'student_id' => $student->id,
        //     'profile_photo' => 'photos/519lROZcUP8vvpsdVEilYT6WsGW1R1XBMIbg4FSx.png',
        //     'issuance_reason' => 'First Issue',
        //     'expires_at' => now()->addYears(2),
        //     'status' => 'ACTIVE',
        // ]);
    }
}
