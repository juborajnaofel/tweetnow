<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition(): array
    {

        $lightColors = [
            '#f0f8ff', // Alice Blue
            '#faebd7', // Antique White
            '#f5f5dc', // Beige
            '#fffaf0', // Floral White
            '#add8e6', // Light Blue
            '#fff0f5', // Lavender Blush
            '#e6e6fa', // Lavender
            '#fff5ee', // Seashell
            '#f5fffa', // Mint Cream
            '#f0fff0', // Honeydew
            '#f0f8ff', // Alice Blue
            '#d3d3d3', // Light Gray
            '#ffffe0', // Light Yellow
            '#e0ffff', // Light Cyan
            '#f0e68c', // Khaki
         ];

         $types = ['post', 'story'];
         
        return [
            'user_id' => User::factory(),
            'content' => fake()->text(200),
            'type' => $types[array_rand($types)],
            'background_color' => $lightColors[array_rand($lightColors)],
            'text_color'=> '#000'
        ];
    }
}
