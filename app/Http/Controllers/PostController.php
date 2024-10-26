<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('category', 'News')
            ->where('state', 'Active')
            ->get();
        return Inertia::render('Post/Index', ['posts' => $posts]);
    }

    public function create()
    {
        return Inertia::render('Post/Create');
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

        return redirect('posts');
    }

    public function archive(Request $request, Post $post)
    {
        $post->state = 'Archived';
        $post->save();

        return redirect()->back()->with('success', 'Post archived successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts');
    }

}