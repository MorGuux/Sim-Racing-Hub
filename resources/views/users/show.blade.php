@extends('layouts.app')

@section('title', 'User Details')

@section('content')
    <ul style="width: 50%; margin: auto">
        <li>Name: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>Posts:
            <ul>
                @foreach ($user->posts as $post)
                    @include('components.post')
                @endforeach
            </ul>
        </li>
        <li>Comments:
            <ul>
                @foreach ($comments as $comment)
                    @include('components.comment')

                @endforeach
            </ul>
    </ul>
@endsection
