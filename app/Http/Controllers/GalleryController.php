<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
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
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'images' => $images, // This will be automatically encoded to JSON
        ]);

        return redirect()->route('gallery');
    }

    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return Inertia::render('Gallery/Show', ['gallery' => $gallery]);
    }

    public function browse()
    {
        $galleries = Gallery::all();
        return Inertia::render('Main/Home/Gallery/Gallery', ['galleries' => $galleries]);
    }

    public function browseShow($id)
    {
        $gallery = Gallery::findOrFail($id);
        return Inertia::render('Main/Home/Gallery/Show', ['gallery' => $gallery]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $images = $gallery->images;
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('images'), $name);
                $images[] = $name;
            }
        }

        $gallery->update([
            'title' => $request->title,
            'images' => $images, // This will be automatically encoded to JSON
        ]);

        return redirect()->route('galleries.index');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return redirect()->route('gallery');
    }
}