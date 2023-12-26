<!-- resources/views/users/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create New User</h1>

    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Create User</button>
    </form>
@endsection
