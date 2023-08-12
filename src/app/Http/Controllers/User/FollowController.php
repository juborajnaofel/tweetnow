<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow($followed_id){
        $user = User::find(Auth::id());
        $user->follows()->attach($followed_id);
    }

    public function unfollow($unfollowed_id){
        $user = User::find(Auth::id());
        $user->follows()->detach($unfollowed_id);
    }
}
