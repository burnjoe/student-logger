<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\FamilyMember;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Students' Information
        $students = [
            [
                'student_no' => '2011253',
                'last_name' => 'Naparan',
                'first_name' => 'Cecilio',
                'middle_name' => 'Mancanes',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2001-01-18'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Banay-Banay, Cabuyao, Laguna',
                'phone' => '9924091282',
                'email' => 'naparancecilio82@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '2000301',
                'last_name' => 'Bolante',
                'first_name' => 'Cedric',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-03-10'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Mamatid, Cabuyao, Laguna',
                'phone' => '9421239511',
                'email' => 'bolantecedric01@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '2000084',
                'last_name' => 'Rodriguez',
                'first_name' => 'Raine',
                'sex' => 'Female',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-10'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Mamatid, Cabuyao, Laguna',
                'phone' => '9421236666',
                'email' => 'rodriguezraine84@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '2002279',
                'last_name' => 'Bernabe',
                'first_name' => 'Pamela',
                'sex' => 'Female',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-04-11'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Mamatid, Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'bernabepamela79@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '2000631',
                'last_name' => 'Balajadia',
                'first_name' => 'Nicolle',
                'sex' => 'Female',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-11-11'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Mamatid, Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'balajadianicolle31@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '2001286',
                'last_name' => 'Cabangon',
                'first_name' => 'Julius Odref Czar',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-11-11'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Mamatid, Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'cabangonjuliusodrefczar86@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '1800269',
                'last_name' => 'Lucas',
                'first_name' => 'Marjorie Jade',
                'sex' => 'Female',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-12-30'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'San Isidro, Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'lucasmarjoriejade69@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '1800234',
                'last_name' => 'Alvarez',
                'first_name' => 'Ivan Jester',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-12-30'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Mamatid, Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'alvarezivanjester34@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '2000565',
                'last_name' => 'Saturno',
                'first_name' => 'Jodi Ira',
                'sex' => 'Female',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-12-30'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'saturnojodiira65@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '2000079',
                'last_name' => 'Escopete',
                'first_name' => 'Joana Mae',
                'sex' => 'Female',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-12-30'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'escopetejoanamae79@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '2000034',
                'last_name' => 'Topacio',
                'first_name' => 'John Bryant',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-12-30'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Banlic, Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'topaciojohnbryant34@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 12
            ],
            [
                'student_no' => '2001134',
                'last_name' => 'Osinsao',
                'first_name' => 'Jerome',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-12-30'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Villa Palao, Calamba, Laguna',
                'phone' => '9426326666',
                'email' => 'osinsaojerome34@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 12
            ],
            [
                'student_no' => '1800124',
                'last_name' => 'Tasan',
                'first_name' => 'Lee Vincent',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-12-30'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'tasanleevincent24@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 12
            ],
            [
                'student_no' => '2000109',
                'last_name' => 'Pancho',
                'first_name' => 'Lanz Rafael',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'pancholanzrafael09@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '2001280',
                'last_name' => 'Del Monte',
                'first_name' => 'John Daniel',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Villa Palao, Calamba, Laguna',
                'phone' => '9426326666',
                'email' => 'delmontejohndaniel80@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '2002248',
                'last_name' => 'Garbin',
                'first_name' => 'Ryan Joy',
                'sex' => 'Female',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'garbinryanjoy48@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '2002264',
                'last_name' => 'Bual',
                'first_name' => 'Jefferson',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'bualjefferson64@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '2001202',
                'last_name' => 'Yanes',
                'first_name' => 'Khyle Matthew',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'yaneskhylematthew02@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => '1901233',
                'last_name' => 'Endaya',
                'first_name' => 'Charlyn',
                'sex' => 'Female',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'endayacharlyn33@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 12
            ],
            [
                'student_no' => '2001223',
                'last_name' => 'Mansana',
                'first_name' => 'Jan Carnmer',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'mansanajancarnmer23@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 5
            ],
            [
                'student_no' => '2002111',
                'last_name' => 'Pedrasa',
                'first_name' => 'Mariquit',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'pedrasamariquit11@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 5
            ],
            [
                'student_no' => '2001231',
                'last_name' => 'Jain',
                'first_name' => 'Alberto',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'jainalberto31@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 5
            ],
            [
                'student_no' => '1900137',
                'last_name' => 'Caspe',
                'first_name' => 'Domingo',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'caspedomingo37@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 5
            ],
            [
                'student_no' => '1802576',
                'last_name' => 'Prado',
                'first_name' => 'Venerando',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'caspedomingo76@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 5
            ],
            [
                'student_no' => '1801982',
                'last_name' => 'Del Rosario',
                'first_name' => 'Angelo',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'delrosarioangelo82@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 5
            ],
            [
                'student_no' => '2002456',
                'last_name' => 'Peña',
                'first_name' => 'Joshua',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'peñajoshua56@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 5
            ],
            [
                'student_no' => '2001789',
                'last_name' => 'Cantalejo',
                'first_name' => 'John Lenard',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'cantalejojohnlenard89@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 5
            ],
            [
                'student_no' => '2000654',
                'last_name' => 'Papa',
                'first_name' => 'Jonas',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'papajonas54@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 5
            ],
            [
                'student_no' => '1902562',
                'last_name' => 'Aguilar',
                'first_name' => 'John Christopher',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2000-06-15'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Cabuyao, Laguna',
                'phone' => '9426326666',
                'email' => 'aguilarjohnchristopher62@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 5
            ],
            [
                'student_no' => 2000364,
                'last_name' => 'Sabana',
                'first_name' => 'Joe Lawrence',
                'middle_name' => 'Morena',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2002-11-25'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => 'Mamatid, Cabuyao, Laguna',
                'phone' => '9213215231',
                'email' => 'sabanajoelawrence64@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
                'student_no' => 2000039,
                'last_name' => 'Batarao',
                'first_name' => 'Joshua',
                'sex' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'birthdate' => Carbon::parse('2002-06-04'),
                'birthplace' => 'Cabuyao, Laguna',
                'address' => '477 Rumba Street Barangay Sala Cabuyao Laguna',
                'phone' => '9484719729',
                'email' => 'bataraojoshua39@gmail.com',
                'account_type' => 'Cabuyeño',
                'program' => 6
            ],
            [
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
                'program' => 6
            ],
        ];

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

        $student->admissions()->create([
            'program_id' => 6,
            'level' => 4,
            'enrolled_at' => now(),
        ]);

        Card::create([
            'rfid' => '0515641249',
            'student_id' => $student->id,
            'profile_photo' => null,
            'issuance_reason' => 'First Issue',
            'expires_at' => now()->addYears(2),
            'contact_person_id' => 1,
            'status' => 'ACTIVE',
        ]);

        $student->family_members()->attach([1, 2, 3]);

        for ($i = 0; $i < count($students); $i++) {
            $student = Student::create([
                'student_no' => $students[$i]['student_no'],
                'last_name' => $students[$i]['last_name'],
                'first_name' => $students[$i]['first_name'],
                'middle_name' => $students[$i]['middle_name'] ?? "",
                'sex' => $students[$i]['sex'],
                'civil_status' => $students[$i]['civil_status'],
                'nationality' => $students[$i]['nationality'],
                'birthdate' => $students[$i]['birthdate'],
                'birthplace' => $students[$i]['birthplace'],
                'address' => $students[$i]['address'],
                'phone' => $students[$i]['phone'],
                'email' => $students[$i]['email'],
                'account_type' => $students[$i]['account_type'],
            ]);

            $father = FamilyMember::factory()->create([
                'last_name' => $student->last_name,
                'first_name' => fake()->firstNameMale(),
                'relationship' => 'Father',
            ]);

            $mother = FamilyMember::factory()->create([
                'last_name' => $student->last_name,
                'first_name' => fake()->firstNameMale(),
                'relationship' => 'Mother',
            ]);

            $guardian = FamilyMember::factory()->create([
                'last_name' => $student->last_name,
                'first_name' => fake()->randomElement([$father->first_name, $mother->first_name]),
                'relationship' => 'Guardian',
                'specified_relationship' => fake()->randomElement([$father->relationship, $mother->relationship]),
                'phone' => fake()->randomElement([$father->phone, $mother->phone]),
            ]);

            $student->family_members()->attach([$father->id, $mother->id, $guardian->id]);

            $student->admissions()->create([
                'program_id' => $students[$i]["program"],
                'level' => 4,
                'enrolled_at' => now(),
            ]);

            Card::factory()->create([
                'student_id' => $student->id,
                'contact_person_id' => fake()->randomElement([$father->id, $mother->id, $guardian->id]),
            ]);
        }
    }
}
