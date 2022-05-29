<?php

namespace App\Http\Controllers;

use App\Micropost;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\MicropostsRequest;

class MicropostsController extends Controller
{
    public function index()
    {
        $microposts = Micropost::orderBy('created_at', 'desc')->get();
        return view('microposts.index', ['microposts' => $microposts]);
    }

    public function create()
    {
        return view('microposts.create');
    }

    public function store(MicropostsRequest $request)
    {
        $micropost = new Micropost;
        $user_id = auth()->user()->id;
        $micropost->user_id = $user_id;
        $micropost->title = $request->title;
        $micropost->content = $request->content;
        $micropost->save();
        return redirect('/microposts');
    }

    public function edit($id)
    {
        $micropost = Micropost::find($id);
        return view('microposts.edit', ['micropost' => $micropost]);
    }

    public function update(MicropostsRequest $request, $id)
    {
        $micropost = Micropost::find($id);
        $user_id = auth()->user()->id;
        if ($micropost->user_id == $user_id) {
            $micropost->title = $request->title;
            $micropost->content = $request->content;
            $micropost->save();
        }
        return redirect('/microposts');
    }

    public function destroy($id)
    {
        $micropost = Micropost::find($id);
        $user_id = auth()->user()->id;
        if ($micropost->user_id == $user_id) {
            $micropost->delete();
        }
        return redirect('/microposts');
    }
}
