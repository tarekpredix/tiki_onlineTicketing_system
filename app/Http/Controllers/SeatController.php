<?php

namespace App\Http\Controllers;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $seats = Seat::all();
        return view('seats.index', compact('seats'));
    }

    public function create()
    {
        return view('seats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'seat_number' => 'required|unique:seats',
        ]);

        Seat::create([
            'seat_number' => $request->input('seat_number'),
        ]);

        return redirect()->route('seats.index')->with('success', 'Seat created successfully');
    }

    public function show($id)
    {
        $seat = Seat::findOrFail($id);
        return view('seats.show', compact('seat'));
    }

    public function edit($id)
    {
        $seat = Seat::findOrFail($id);
        return view('seats.edit', compact('seat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'seat_number' => 'required|unique:seats,seat_number,' . $id,
        ]);

        $seat = Seat::findOrFail($id);
        $seat->update([
            'seat_number' => $request->input('seat_number'),
        ]);

        return redirect()->route('seats.index')->with('success', 'Seat updated successfully');
    }

    public function destroy($id)
    {
        $seat = Seat::findOrFail($id);
        $seat->delete();

        return redirect()->route('seats.index')->with('success', 'Seat deleted successfully');
    }
}
