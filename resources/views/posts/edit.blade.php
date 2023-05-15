@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}">
        @csrf
        @method('PATCH')
        <p>Title: <input type="text" name="title" value="{{ $post->title }}"></p>
        <p>Body: <textarea name="body">{{ $post->body }}</textarea></p>
        <p>Car: <select name="car_id">
            @foreach ($cars as $car)
                <option value="{{ $car->id }}" @if ($car->id == $post->car_id) selected="selected" @endif>{{ $car->name }}</option>
            @endforeach
        </select></p>
        <p>Track: <select name="track_id"">
            @foreach ($tracks as $track)
                <option value="{{ $track->id }}" @if ($track->id == $post->track_id) selected="selected" @endif>{{ $track->name }}</option>
            @endforeach
        </select></p>
        <p>Image: <input type="text" name="image" value="{{ $post->image }}"></p>
        <p>Tags: <select name="tags[]" multiple>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" @if ($post->tags->contains($tag)) selected="selected" @endif>{{ $tag->name }}</option>
            @endforeach
        <input type="submit" value="Edit Post">
        <div>
            <a href="{{ route('posts.show', ['id' => $post->id]) }}">Cancel</a>
        </div>
    </form>
@endsection
