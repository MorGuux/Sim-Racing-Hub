@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <p>Posts</p>
    <ul>
        @foreach ($posts as $post)
            <li><a href="/posts/{{ $post->id }}">{{ $post->title }}</li>
        @endforeach
    </ul>
@endsection