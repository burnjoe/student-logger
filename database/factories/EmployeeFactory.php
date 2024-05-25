<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
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
        } while (Employee::where('phone', $phone)->exists());
        
        return [
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->randomElement([fake()->lastName(), null]),
            'sex' => fake()->randomElement(['Male', 'Female']),
            'birthdate' => fake()->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
            'address' => fake()->city(),
            'phone' => $phone,
        ];
    }
}
