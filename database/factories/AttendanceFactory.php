<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate a random student ID
        $studentId = Student::inRandomOrder()->value('id');
        // Generate a random post ID
        $postId = Post::inRandomOrder()->value('id');

        // Generate a random time for logged in and a later random time for logged out
        $loggedInAt = fake()->dateTimeThisYear();
        $loggedOutAt = clone $loggedInAt;
        $loggedOutAt->modify('+' . mt_rand(1, 12) . ' hours');
        $loggedOutAt = fake()->randomElement([$loggedOutAt, null]);

        $status = fake()->randomElement(['IN', 'MISSED']);
        $status = $loggedOutAt ? 'OUT' : ($status == 'MISSED' && $postId == 1 ? 'MISSED' : 'IN');

        return [
            'student_id' => $studentId,
            'logged_in_at' => $loggedInAt,
            'logged_out_at' => $loggedOutAt,
            'status' => $status,
            'post_id' => $postId, 
        ];
    }
}
