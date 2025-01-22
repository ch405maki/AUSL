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
        return Inertia::render('OfficePost/Index');
    }

    
    public function create()
    {
        return Inertia::render('OfficePost/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image.*' => 'nullable|image|mimes:jpg,png,gif|max:10240',
            'category' => 'string',
            'state' => 'nullable|string',
            'created_at' => 'required|date',
        ]);

        $data = $request->all();

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
