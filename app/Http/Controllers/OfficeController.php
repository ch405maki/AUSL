<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Office;
use Illuminate\Support\Facades\Storage;

class OfficeController extends Controller
{
    public function index(){
        $offices = Office::all();
        return Inertia::render('Office/Index', ['offices' => $offices]);
    }

    public function store(Request $request) 
{
    // Validation rules
    $request->validate([
        'office_name' => 'required|string|max:255',
        'office_location' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 7MB max size per image
    ], [
        'image.*.max' => 'Each uploaded image must not exceed 10 MB.', // Custom error message for 7MB limit
    ]);

    // Initialize an empty array for storing image URLs
    $imageUrls = [];

    // Check if images are uploaded
    if ($request->hasfile('image')) {
        foreach ($request->file('image') as $imageFile) {
            // Store the image and add its URL to the $imageUrls array
            $path = $imageFile->store('public/offices');
            $imageUrls[] = Storage::url($path);
        }
    }

    // Create a new office entry with images stored as a JSON string
    Office::create([
        'office_name' => $request->office_name,
        'office_location' => $request->office_location,
        'category' => $request->category,
        'image' => $imageUrls,
    ]);

    return redirect()->back()->with('success', 'Saved successfully.');
}



    public function update(Request $request, $id)
    {
        $office = Office::findOrFail($id);

        $request->validate([
            'office_name' => 'required|string|max:255',
            'office_location' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $office->office_name = $request->input('office_name');
        $office->office_location = $request->input('office_location');
        $office->category = $request->input('category');

        if ($request->hasFile('image')) {
            // Handle image upload
            $image = $request->file('image');
            $imagePath = $image->store('images/offices', 'public');
            $office->image = $imagePath;
        }

        $office->save();

        return redirect()->route('offices')->with('success', 'Office updated successfully.');
    }

    public function destroy($id)
    {
        $office = Office::findOrFail($id);
        $office->delete();

        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}
