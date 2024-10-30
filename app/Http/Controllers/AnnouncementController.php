<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $posts = Post::whereIn('category', ['Announcement', 'Deans', 'Events'])
            ->where('state', 'Active')
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Announcement/Index', ['posts' => $posts]);
    }


    public function createAnnouncement(){
        return Inertia::render('Announcement/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string', 
            'image' => 'nullable|image|mimes:jpg,png,gif|max:10240',
            'category' => 'required|string',
            'state' => 'nullable|string',
            'link' => 'nullable|url',
            'created_at' => 'required|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $data['image'] = Storage::url($path);
        }

        $post = Post::create($data);

        return redirect('announcement');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('announcement');
    }
}
