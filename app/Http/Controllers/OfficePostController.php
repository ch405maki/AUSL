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
    public function accounting()
    {
        $posts = OfficePost::where('category', 'Accounting')
            ->where('state', 'Active')
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
}
