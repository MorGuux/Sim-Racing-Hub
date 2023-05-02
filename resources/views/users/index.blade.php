@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <h1>Users</h1>
    <ul>
        @foreach ($users as $user)
            <li><a href="{{ route('users.show', ['id' => $user->id]) }}">{{ $user->name }}</a></li>
        @endforeach
    </ul>
@endsection