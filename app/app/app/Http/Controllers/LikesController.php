<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function store(Post $post)
    {
        $user_id = auth()->user()->id;
        $post->like_users()->attach($user_id);
        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        $user_id = auth()->user()->id;
        $post->like_users()->detach($user_id);
        return redirect('/posts');
    }
}
