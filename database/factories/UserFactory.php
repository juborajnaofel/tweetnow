<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'bio' => fake()->text(200),
            'social_links' => $this->generateSocialLinks()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }


    private function generateSocialLinks()
    {
        $socialPlatforms = ['Facebook', 'Twitter', 'Instagram', 'LinkedIn', 'GitHub'];
        $numberOfLinks = rand(1, count($socialPlatforms));
        $links = [];

        for ($i = 0; $i < $numberOfLinks; $i++) {
            $platform = $socialPlatforms[array_rand($socialPlatforms)];
            $url = $this->generateRandomUrl($platform);
            $links[] = [
                'url' => $url,
                'type' => $platform,
            ];
        }

        return $links;
    }

    private function generateRandomUrl($platform)
    {
        $platformUrls = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Instagram' => 'https://instagram.com',
            'LinkedIn' => 'https://linkedin.com',
            'GitHub' => 'https://github.com',
        ];

        return $platformUrls[$platform] ?? 'https://example.com';
    }
}
