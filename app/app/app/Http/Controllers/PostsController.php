<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostsRequest $request)
    {
        $post = new Post;
        $user_id = auth()->user()->id;
        $post->user_id = $user_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect('/posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(PostsRequest $request, $id)
    {
        $post = Post::find($id);
        $user_id = auth()->user()->id;
        if ($post->user_id == $user_id) {
            $post->title = $request->title;
            $post->content = $request->content;
            $post->save();
        }
        return redirect('/posts');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $user_id = auth()->user()->id;
        if ($post->user_id == $user_id) {
            $post->delete();
        }
        return redirect('/posts');
    }
}
