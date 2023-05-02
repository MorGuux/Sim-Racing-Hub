@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <p>Posts</p>
    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</li>
        @endforeach
    </ul>
@endsection