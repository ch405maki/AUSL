<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserLog;

use HTMLPurifier;
use HTMLPurifier_Config;

use App\Models\OfficePost;

class OfficePostController extends Controller
{
    public function index($category)
    {
        $category = $category;
        $posts = OfficePost::where('category', $category)
            ->where('state', 'active')
            ->get();

        return Inertia::render('OfficePost/Index', ['posts' => $posts, 'category' => $category]);
    }
    
    public function archivedPost()   
    {
        $posts = OfficePost::where('state', 'archived')
        ->get();

        return Inertia::render('OfficePost/Index', ['posts' => $posts]);
    }

    public function create()
    {
        return Inertia::render('OfficePost/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string',
            'image.*' => 'nullable|file|mimes:jpeg,jpg,png,gif,pdf|max:10240',
            'category' => 'string',
            'state' => 'nullable|string',
            'link' => 'nullable|url',
            'created_at' => 'required|date',
        ]);

        $data = $request->all();

        $dd = $data;

        // Handle multiple images
        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $path = $file->store('public/officePost');
                $imagePaths[] = Storage::url($path);
            }
        }

        $data['image'] = $imagePaths;

        OfficePost::create($data);

        UserLog::create([
            'user_id' => Auth::id(),
            'action' => 'Upload Announcement',
        ]);

        return redirect('officepost');
    }

    public function bursar()
    {
        $office = "Bursar";
        $posts = OfficePost::where('category', 'Bursar')
            ->where('state', 'active')
            ->orderBy('created_at', 'desc')
            ->get();
    
        $archives = OfficePost::where('category', 'Bursar')
            ->where('state', 'archived')
            ->orderBy('created_at', 'desc')
            ->get();
    
        return Inertia::render('Main/Office/Index', ['posts' => $posts, 'archives' => $archives, 'office' => $office]);
    }

    public function registrar()
    {
        $office = "Registrar";
        $posts = OfficePost::where('category', 'Registrar')
            ->where('state', 'active')
            ->orderBy('created_at', 'desc')
            ->get();
    
        $archives = OfficePost::where('category', 'Registrar')
            ->where('state', 'archived')
            ->orderBy('created_at', 'desc')
            ->get();
    
        return Inertia::render('Main/Office/Index', ['posts' => $posts, 'archives' => $archives, 'office' => $office]);
    }

    public function guidance()
    {
        $office = "Guidance and Counseling Center";
        $posts = OfficePost::where('category', 'Guidance')
            ->where('state', 'active')
            ->orderBy('created_at', 'desc')
            ->get();
    
        $archives = OfficePost::where('category', 'Guidance')
            ->where('state', 'archived')
            ->orderBy('created_at', 'desc')
            ->get();
    
        return Inertia::render('Main/Office/Index', ['posts' => $posts, 'archives' => $archives, 'office' => $office]);
    }

    public function itc()
    {
        $office = "IT Center";
        $posts = OfficePost::where('category', 'IT Center')
            ->where('state', 'active')
            ->orderBy('created_at', 'desc')
            ->get();
    
        $archives = OfficePost::where('category', 'IT Center')
            ->where('state', 'archived')
            ->orderBy('created_at', 'desc')
            ->get();
    
        return Inertia::render('Main/Office/Index', ['posts' => $posts, 'archives' => $archives, 'office' => $office]);
    }

    public function library()
    {
        $office = "Library";
        $posts = OfficePost::where('category', 'Library')
            ->where('state', 'active')
            ->orderBy('created_at', 'desc')
            ->get();
    
        $archives = OfficePost::where('category', 'Library')
            ->where('state', 'archived')
            ->orderBy('created_at', 'desc')
            ->get();
    
        return Inertia::render('Main/Office/Index', ['posts' => $posts, 'archives' => $archives, 'office' => $office]);
    }

    public function archive($id)
    {
        $post = OfficePost::findOrFail($id);
        $post->state = 'archived'; 
        $post->save();

        return redirect()->back()->with('success', 'Post archived successfully.');
    }

    public function destroy($id)
    {
        $post = OfficePost::findOrFail($id);
        $post->delete();

        UserLog::create([
            'user_id' => Auth::id(),
            'action' => 'Deleted Post',
        ]);

        return redirect()->route('officepost.index');
    }
    
}
