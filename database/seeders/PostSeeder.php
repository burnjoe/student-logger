<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'name' => 'Main Gate',
        ]);

        Post::create([
            'name' => 'Library',
        ]);

        Post::create([
            'name' => 'Clinic',
        ]);
    }
}
