<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all student data from the database
        $siswas = siswa::all();

        // Pass the student data to the view index.blade.php
        return view('guru.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Logic for creating a new resource (optional)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logic for storing a newly created resource (optional)
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Logic for displaying a specific resource (optional)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve data by ID
        $guru = siswa::findOrFail($id);

        // Send the data to the edit view
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'status' => 'required',
        ]);

        // Retrieve the resource by ID
        $guru = siswa::findOrFail($id);

        // Update the resource with the new status
        $guru->update([
            'status' => $request->status,
        ]);

        // Redirect to the index route with a success message
        return redirect()->route('guru.index')->with(['success' => 'Data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Logic for removing a resource (optional)
    }
}
