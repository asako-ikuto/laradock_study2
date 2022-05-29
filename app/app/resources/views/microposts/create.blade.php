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
            <form method="POST" action="{{ route('microposts.store') }}">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="title">タイトル</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="content">コンテンツ</label>
                        <textarea class="form-control" name="content" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">
                        {{ __('新規投稿') }}
                    </button>
                </div>
            </form>
        </div>
    @endsection
