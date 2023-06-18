<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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

    public function create()
    {
    }
    public function store(Request $request)
    {
        $request->validate([
            'content' => ['required', 'string']
        ]);
        try {
            Post::create([
                'user_id' => Auth::user()->id,
                'content' => $request->content
            ]);
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'successfully created a post'
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with([
                'status' => 'error',
                'message' => $e
            ]);
        }
    }
    public function edit()
    {
    }
    public function update()
    {
    }
    public function show()
    {
    }
    public function destroy()
    {
    }
}
