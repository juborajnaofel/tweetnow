<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();

        $posts = [
            [
                'user_id' => 1,
                'content' => 'This is the content of post 1',
            ],
            [
                'user_id' => 1,
                'content' => 'This is the content of post 2',
            ],
        ];

        Post::insert($posts);
    }
}
