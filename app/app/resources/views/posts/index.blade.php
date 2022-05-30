@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <div class="text-center pt-4 pb-4 pr-2 pl-2" style="background-color: #E8E9EE;">
                    <h1>{{ $post->title }}</h1>
                    <p>{{ $post->content }}</p>
                    <hr>
                    <p style="display:inline-block;">投稿者：{{ $post->user->name }}</p>
                    @if (Auth::check() && auth()->user()->id == $post->user_id)
                        <div style="display:inline-block;" class="ml-2">
                            <form method="GET" action="{{ route('posts.edit', $post->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    {{ __('編集する') }}
                                </button>
                            </form>
                        </div>
                        <div style="display:inline-block;">
                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    {{ __('削除する') }}
                                </button>
                            </form>
                        </div>
                    @endif
                    <div style="display:inline-block;" class="ml-4">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <p style="display:inline-block;" class="ml-4">1</p>
                </div>
                <hr>
            @endforeach
        @endif
    @endsection
