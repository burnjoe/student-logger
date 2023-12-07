<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate a random student ID
        $studentId = (Student::factory()->create())->id;

        return [
            'rfid' => strval(fake()->unique()->numberBetween(1000000000, 9999999999)),
            'student_id' => $studentId,
            'profile_photo' => asset('img/id_picture.png'),
            'signature' => asset('img/id_picture.png'),
            'issuance_reason' => 'First Issue',
            'expires_at' => now()->addYears(2),
        ];
    }
}
