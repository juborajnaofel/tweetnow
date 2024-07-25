<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id'); // Retrieve all existing user IDs

        foreach (range(1, 10) as $index) {
            Post::factory()->create([
                'user_id' => $users->random(), // Assign a random user ID from the existing users
            ]);
        }
    }
}
