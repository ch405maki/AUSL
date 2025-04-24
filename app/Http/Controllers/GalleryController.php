<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest('year')->get();
        return Inertia::render('Gallery/Index', ['galleries' => $galleries]);
    }

    public function create()
    {
        return Inertia::render('Gallery/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:50',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        $images = [];
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/gallery');
                $images[] = Storage::url($path);
            }
        }

        Gallery::create([
            'title' => $request->title,
            'year' => $request->year,
            'images' => $images,
        ]);

        return redirect()->route('gallery');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return inertia('Gallery/Edit', ['gallery' => $gallery]);
    }

    public function update(Request $request, $id)
    {
    // Validate the incoming data
    $request->validate([
        'title' => 'required|string|max:255',
        'year' => 'required|string|max:50',
        'newImages.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Retrieve the existing gallery record
    $gallery = Gallery::findOrFail($id);

    // Get the existing images from the gallery
    $images = $gallery->images;

    // If there are new images, process and add them to the gallery
    if ($request->hasfile('newImages')) {
        foreach ($request->file('newImages') as $image) {
            $path = $image->store('public/gallery');
            $images[] = Storage::url($path);
        }
    }

    // Update the gallery record with the new data
    $gallery->update([
        'title' => $request->title,
        'year' => $request->year,
        'images' => $images, // Existing and new images combined
    ]);

    return redirect()->route('gallery')->with('success', 'Gallery updated successfully');
    }



    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return Inertia::render('Gallery/Show', ['gallery' => $gallery]);
    }

    public function browse()
    {
        $galleries = Gallery::latest()->get();
        return Inertia::render('Main/Home/Gallery/Gallery', ['galleries' => $galleries]);
    }

    public function browseShow($id)
    {
        $gallery = Gallery::findOrFail($id);
        return Inertia::render('Main/Home/Gallery/Show', ['gallery' => $gallery]);
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        UserLog::create([
            'user_id' => Auth::id(),
            'action' => 'Deleted gallery',
        ]);

        return redirect()->route('gallery');
    }
}