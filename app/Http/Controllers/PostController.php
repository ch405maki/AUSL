<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;

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
        'image.*' => 'nullable|image|mimes:jpg,png,gif|max:10240',
        'category' => 'required|string',
        'state' => 'nullable|string',
        'link' => 'nullable|url',
        'created_at' => 'required|date',
    ]);

    $data = $request->all();

    $imagePaths = [];
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $file) {
            $path = $file->store('public/images');
            $imagePaths[] = Storage::url($path);
        }
    }

    // Assign array of image paths to 'image' field
    $data['image'] = $imagePaths;

    Post::create($data);

    UserLog::create([
        'user_id' => Auth::id(),
        'action' => 'Created New Post',
    ]);

    return redirect('posts');
    }

    public function archive(Request $request, Post $post)
    {
        $post->state = 'Archived';
        $post->save();

        UserLog::create([
            'user_id' => Auth::id(),
            'action' => 'Archived Post',
        ]);

        return redirect()->back()->with('success', 'Post archived successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        UserLog::create([
            'user_id' => Auth::id(),
            'action' => 'Deleted Post',
        ]);

        return redirect()->route('posts');
    }

}