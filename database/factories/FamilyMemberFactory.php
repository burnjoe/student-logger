<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FamilyMember>
 */
class FamilyMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $prefixes = ['921', '918', '927', '938', '947'];

        return [
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'relationship' => $relationship = fake()->randomElement(['Mother', 'Father', 'Guardian']),
            'specified_relationship' => $relationship == 'Guardian' ? fake()->randomElement(['Aunt', 'Uncle', 'Mother', 'Father', 'Grandmother', 'Grandfather']) : null,
            'occupation' => 'N/A',
            'phone' => fake()->randomElement($prefixes) . fake()->unique()->numerify('#######'),
        ];
    }
}
