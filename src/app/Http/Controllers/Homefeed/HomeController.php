<?php

namespace App\Http\Controllers\Homefeed;

use App\Http\Controllers\Controller;
use App\Models\Post;
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
}
