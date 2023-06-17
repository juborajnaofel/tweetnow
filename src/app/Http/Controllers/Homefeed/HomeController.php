<?php

namespace App\Http\Controllers\Homefeed;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function fetchPosts(Request $request)
    {
        $limit = $request->get('limit');
        $step = $request->get('step');

        $limit = is_numeric($limit) ? $limit : 10;
        $step = is_numeric($step) ? $step : 0;

        return Post::with('user')
            ->latest()
            ->offset($step)
            ->limit($limit)
            ->get();
    }

    public function fetchUsers(Request $request)
    {
        $limit = $request->get('limit');
        $step = $request->get('step');

        $limit = is_numeric($limit) ? $limit : 10;
        $step = is_numeric($step) ? $step : 0;

        return User::latest()
            ->offset($step)
            ->limit($limit)
            ->get();
    }
}
