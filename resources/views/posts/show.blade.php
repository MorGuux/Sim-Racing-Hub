@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
    <ul>
        <li>Title: {{ $post->title }}</li>
        <li>Body: {{ $post->body }}</li>
        <li>Author: {{ $post->user->name }}</li>
        <li>Car: {{ $post->car->name }}</li>
        <li>Track: {{ $post->track->name }}</li>
        <li>Author: {{ $post->user->name }}</li>
        <li>Comments:
            <p>Add a comment</p>
            <form method="POST" action="{{ route('comments.store', ['id' => $post->id]) }}">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <p>Body: <textarea name="body" value="{{ old('body') }}"></textarea></p>
                <input type="submit" value="Add Comment">
            <ul>
                @foreach ($post->comments as $comment)
                    <div>
                        <li>Author: {{ $comment->user->name }}</li>
                        <li>Body: {{ $comment->body }}</li>
                    </div>
                @endforeach
            </ul>
        </li>
    </ul>
@endsection
