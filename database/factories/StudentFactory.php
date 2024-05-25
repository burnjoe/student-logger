<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $prefixes = ['921', '918', '927', '938', '947'];

        do {
            $phone = fake()->randomElement($prefixes) . fake()->unique()->numerify('#######');
        } while (Student::where('phone', $phone)->exists());
        
        return [
            'student_no' => fake()->unique()->numberBetween(1000000, 2000000),
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->randomElement([fake()->lastName(), '']),
            'sex' => fake()->randomElement(['Male', 'Female']),
            'civil_status' => 'Single',
            'nationality' => 'Filipino',
            'birthdate' => fake()->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
            'birthplace' => fake()->city(),
            'address' => fake()->city(),
            'phone' => $phone,
            'email' => fake()->unique()->email(),
            'account_type' => fake()->randomElement(['Cabuyeño', 'Non-Cabuyeño'])
        ];
    }
}
