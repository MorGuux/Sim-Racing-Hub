@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
    <ul>
        <li>Title: {{ $post->title }}</li>
        <li>Body: {{ $post->body }}</li>
        <li>Author: {{ $post->user->name }}</li>
        <li>Car: {{ $post->car->name }}</li>
        <li>Track: {{ $post->track->name }}</li>
    </ul>
@endsection