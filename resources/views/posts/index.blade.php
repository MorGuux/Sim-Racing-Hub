@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <!-- List of posts -->
    <ul>
        @foreach ($posts as $post)
            <li>
                <div style="padding: 5px">
                    <a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
                    <a href="{{ route('users.show', ['id' => $post->user->id]) }}">by {{ $post->user->name }}</a>
                    <a>{{ $post->created_at->diffForHumans() }}</a>
                </div>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('posts.create') }}">Create Post</a>
@endsection
