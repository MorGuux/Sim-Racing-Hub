@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <!-- List of posts -->
    <ul style="width: 50%; margin: auto">
    <a href="{{ route('posts.create') }}">Create Post</a>
        @foreach ($posts as $post)
            <li>
                <!-- Use post template -->
                @include('components.post')
            </li>
        @endforeach
    </ul>
@endsection
