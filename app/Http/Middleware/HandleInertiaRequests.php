<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'toast' => function () use ($request) {
                return [
                    'status' => $request->session()->get('status'),
                    'message' => $request->session()->get('message'),
                ];
            },
            'configs' => function () use ($request) {
                return [
                    'post_character_limit' => config('post.limit.character'),
                    'logo' => asset('images/TweetNowLogo.png'),
                    'user_fallback_image' => asset('images/person.png')
                ];
            },
        ]);
    }
}
