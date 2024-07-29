<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test User',
            'email' => 'test@tweetnow.juborajnaofel.xyz',
            'password' => Hash::make('password'),
            'bio' => 'test@tweetnow.juborajnaofel.xyz',
            'social_links' => $this->generateSocialLinks()
        ]);

        User::factory(1000)->create([
            'password' => Hash::make('password'),
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
