<!-- resources/views/seats/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Seat</h1>

    <form action="{{ route('seats.update', $seat->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="seat_number">Seat Number:</label>
        <input type="text" name="seat_number" value="{{ $seat->seat_number }}" required>
        <br>
        <button type="submit">Update Seat</button>
    </form>
@endsection
