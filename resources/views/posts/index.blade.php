@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div style="width: 50%; margin: auto">
        <a style="float: left" href="{{ route('posts.create') }}">Create Post</a>
        <!-- Offer tag filtering -->
        <form style="float: right" method="GET" action="{{ route('posts.index') }}">
            <select name="tag">
                <option value="">All</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" @if ($tag->id == app('request')->input('tag')) selected="selected" @endif>
                        {{ $tag->name }}</option>
                @endforeach
            </select>
            <input type="submit" value="Filter">
        </form>
    </div>
    <!-- List of posts -->
    <ul style="width: 50%; margin: auto">
        @foreach ($posts as $post)
            <li>
                <!-- Use post template -->
                @include('components.post')
            </li>
        @endforeach
    </ul>
@endsection
