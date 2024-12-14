<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;

use HTMLPurifier;
use HTMLPurifier_Config;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $posts = Post::whereIn('category', ['Announcement', 'Deans', 'Events', 'underExam', 'Exam' ])
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
            'iframe' => 'nullable|string',
            'image.*' => 'nullable|image|mimes:jpg,png,gif|max:10240',
            'pubmat' => 'nullable|image|mimes:jpg,png,gif|max:10240',
            'category' => 'required|string',
            'state' => 'nullable|string',
            'link' => 'nullable|url',
            'created_at' => 'required|date',
        ]);

        $data = $request->all();

        // Handle multiple images
        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $path = $file->store('public/images');
                $imagePaths[] = Storage::url($path);
            }
        }

        // Handle pubmat file
        $pubmatPath = null;
        if ($request->hasFile('pubmat')) {
            $pubmatPath = $request->file('pubmat')->store('public/pubmats');
            $data['pubmat'] = Storage::url($pubmatPath);
        }

        // Assign array of image paths to 'image' field
        $data['image'] = $imagePaths;

        Post::create($data);

        UserLog::create([
            'user_id' => Auth::id(),
            'action' => 'Upload Announcement',
        ]);

        return redirect('announcement');
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return inertia('Announcement/Edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
{
    // Validate the incoming data
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'nullable|string',
        'link' => 'nullable|url',
        'state' => 'nullable|string', // You can still allow state to be nullable
        'newImages.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // For additional images
        'pubmat' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // For pubmat image
    ]);

    // Retrieve the existing post record
    $post = Post::findOrFail($id);

    // Get the existing images from the post
    $images = $post->image; // Assumes 'image' is an array stored in the database

    // If there are new images, process and add them to the post
    if ($request->hasFile('newImages')) {
        foreach ($request->file('newImages') as $image) {
            $path = $image->store('public/images');  // Store new image
            $images[] = Storage::url($path);  // Add to existing images array
        }
    }

    // Handle the pubmat file (if any)
    if ($request->hasFile('pubmat')) {
        $pubmatPath = $request->file('pubmat')->store('public/pubmats');
        $post->pubmat = Storage::url($pubmatPath);  // Store pubmat file URL
    }

    // Update the post record with the new data, ensuring 'state' is set to 'Active'
    $post->update([
        'title' => $request->title,
        'content' => $request->content,
        'link' => $request->link,
        'state' => 'Active', // Set the state to "Active"
        'created_at' => $request->created_at,
        'image' => $images, // Existing and new images combined
        'pubmat' => isset($post->pubmat) ? $post->pubmat : null, // Ensure the pubmat field is included
    ]);

    return redirect()->route('announcement')->with('success', 'Post updated successfully');
}


    

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        UserLog::create([
            'user_id' => Auth::id(),
            'action' => 'Deleted Announcement',
        ]);

        return redirect()->route('announcement');
    }
}
