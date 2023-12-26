<!-- resources/views/trips/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create New Trip</h1>

    <form action="{{ route('trips.store') }}" method="post">
        @csrf
        <label for="date">Date:</label>
        <input type="date" name="date" required>
        <br>
        <label for="departure_location_id">Departure Location:</label>
        <select name="departure_location_id" required>
            @foreach($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="intermediate_locations">Intermediate Locations:</label>
        <select name="intermediate_locations[]" multiple>
            @foreach($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="destination_location_id">Destination Location:</label>
        <select name="destination_location_id" required>
            @foreach($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Create Trip</button>
    </form>
@endsection
