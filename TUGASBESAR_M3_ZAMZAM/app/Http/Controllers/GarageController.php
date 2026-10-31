<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use Illuminate\Http\Request;

class GarageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $garages = Garage::latest()->get();
        return view('garages.index', compact('garages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('garages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'service_type' => 'required|in:maintenance,repair,tire_service,car_wash',
        ]);

        Garage::create($validated);

        return redirect()->route('garages.index')->with('success', 'Bengkel berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Garage $garage)
    {
        return view('garages.show', compact('garage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Garage $garage)
    {
        return view('garages.edit', compact('garage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Garage $garage)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'service_type' => 'required|in:maintenance,repair,tire_service,car_wash',
        ]);

        $garage->update($validated);

        return redirect()->route('garages.index')->with('success', 'Bengkel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Garage $garage)
    {
        $garage->delete();

        return redirect()->route('garages.index')->with('success', 'Bengkel berhasil dihapus.');
    }
}
