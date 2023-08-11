<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private function checkPostOwner($user_id)
    {
        return $user_id == Auth::user()->id;
    }

    public function fetchPosts(Request $request)
    {
        $limit = is_numeric($request->limit) ? $request->limit: 10;
        $step = is_numeric($request->step) ? $request->step : 0;

        $posts =  Post::with('user')
            ->latest()
            ->offset($step)
            ->limit($limit)
            ->get();

        return $posts;
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
    public function destroy(Post $post)
    {
        try {
            if(!$this->checkPostOwner($post->user_id)){
                return redirect()->back()->with([
                    'status' => 'error',
                    'message' => 'Unathorized action'
                ]);
            }

            $post->delete();
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'successfully deleted a post'
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with([
                'status' => 'error',
                'message' => $e
            ]);
        }
    }
}
