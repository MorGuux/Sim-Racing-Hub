@extends('layouts.app')

@section('title', 'User Details')

@section('content')
    <ul>
        <li>Name: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>Posts: 
            <ul>
                @foreach ($user->posts as $post)
                    <div>
                        <li>Title: {{ $post->title }}</li>
                        <li>Body: {{ $post->body }}</li>
                        <li>Car: {{ $post->car->name }}</li>
                        <li>Track: {{ $post->track->name }}</li>
                    </div>
                @endforeach
            </ul>
        </li>
        <li>Comments:
            <ul>
                @foreach ($comments as $comment)
                    <div>
                        <li>Body: {{ $comment->body }}</li>
                        <li>Post: <a href="{{ route('posts.show', ['id' => $comment->post->id]) }}">{{ $comment->post->title }}</a></li>
                    </div>
                @endforeach
            </ul>
    </ul>
@endsection