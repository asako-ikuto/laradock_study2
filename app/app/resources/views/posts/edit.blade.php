@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($errors) > 0)
            <div>
                <ul class="alert alert-danger" style="list-style: none;" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="justify-content-center">
            <form method="POST" action="{{ route('posts.update', $post->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="title">タイトル</label>
                        <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="content">コンテンツ</label>
                        <textarea class="form-control" name="content" rows="10">{{ $post->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">
                        {{ __('編集完了') }}
                    </button>
                </div>
            </form>
        </div>
    @endsection
