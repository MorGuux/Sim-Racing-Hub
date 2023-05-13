@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <p>Title: <input type="text" name="title" value="{{ old('title') }}"></p>
        <p>Body: <textarea name="body" value="{{ old('body') }}"></textarea></p>
        <p>Car: <select name="car_id" value="{{ old('car_id') }}">
            @foreach ($cars as $car)
                <option value="{{ $car->id }}">{{ $car->name }}</option>
            @endforeach
        </select></p>
        <p>Track: <select name="track_id" value="{{ old('track_id') }}">
            @foreach ($tracks as $track)
                <option value="{{ $track->id }}">{{ $track->name }}</option>
            @endforeach
        </select></p>
        <p>Image: <input type="text" name="image" value="{{ old('image') }}"></p>
        <p>Tags: <select name="tags[]" multiple>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        <input type="submit" value="Create Post">
        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>
@endsection
