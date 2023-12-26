<?php

namespace App\Http\Controllers;
use App\Models\Trip;
use App\Models\Location;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('trips.index', compact('trips'));
    }

    public function create()
    {
        $locations = Location::all();
        return view('trips.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'departure_location_id' => 'required|exists:locations,id',
            'intermediate_locations.*' => 'exists:locations,id',
            'destination_location_id' => 'required|exists:locations,id',
        ]);

        Trip::create([
            'date' => $request->input('date'),
            'departure_location_id' => $request->input('departure_location_id'),
            'intermediate_locations' => $request->input('intermediate_locations'),
            'destination_location_id' => $request->input('destination_location_id'),
        ]);

        return redirect()->route('trips.index')->with('success', 'Trip created successfully');
    }

    public function show($id)
    {
        $trip = Trip::findOrFail($id);
        return view('trips.show', compact('trip'));
    }

    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        $locations = Location::all();
        return view('trips.edit', compact('trip', 'locations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'departure_location_id' => 'required|exists:locations,id',
            'intermediate_locations.*' => 'exists:locations,id',
            'destination_location_id' => 'required|exists:locations,id',
        ]);

        $trip = Trip::findOrFail($id);
        $trip->update([
            'date' => $request->input('date'),
            'departure_location_id' => $request->input('departure_location_id'),
            'intermediate_locations' => $request->input('intermediate_locations'),
            'destination_location_id' => $request->input('destination_location_id'),
        ]);

        return redirect()->route('trips.index')->with('success', 'Trip updated successfully');
    }

    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();

        return redirect()->route('trips.index')->with('success', 'Trip deleted successfully');
    }
}
