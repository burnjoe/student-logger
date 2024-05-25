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
        return [
            'rfid' => strval(fake()->unique()->numberBetween(1000000000, 9999999999)),
            'student_id' => null,
            'profile_photo' => null,
            'issuance_reason' => 'First Issue',
            'expires_at' => now()->addYears(2),
            'status' => 'ACTIVE',
            'contact_person_id' => null,
        ];
    }
}
