<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch alumni data from the database
        $alumni = Alumni::all();

        // Return a view with the alumni data
        return inertia('Alumni/Index', ['alumni' => $alumni]);
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB max
            'batch' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        // Handle the image upload if present
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/alumni_images');
            $imagePath = Storage::url($imagePath); // This will generate a URL like /storage/alumni_images/filename
        }

        // Create a new alumni record
        Alumni::create([
            'name' => $validatedData['name'],
            'content' => $validatedData['content'],
            'image' => $imagePath,
            'batch' => $validatedData['batch'],
            'status' => $validatedData['status'] ?? false, // Default to false if not provided
        ]);

        // Redirect back with a success message
        return redirect()->route('alumni')->with('success', 'Alumni saved successfully.');
    }

    public function approve(Request $request, $id)
    {
        $alumnus = Alumni::findOrFail($id);
        $alumnus->status = true;
        $alumnus->save();

        return redirect()->route('alumni')->with('success', 'Alumni approved successfully.');
    }

    public function forApproval(Request $request, $id)
    {
        $alumnus = Alumni::findOrFail($id);
        $alumnus->status = false;
        $alumnus->save();

        return redirect()->route('alumni')->with('success', 'Alumni approved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(fc $fc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fc $fc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fc $fc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the alumni record by ID
        $alumni = Alumni::findOrFail($id);

        // Delete the alumni record
        $alumni->delete();

        // Redirect back with a success message
        return redirect()->route('alumni')->with('success', 'Alumni deleted successfully.');
    }
}
