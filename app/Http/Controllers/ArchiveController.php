<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Inertia\Inertia;
use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function newsIndex()
    {
        $posts = Post::where('category', 'News')
            ->where('state', 'Archived')
            ->get();

        return Inertia::render('Archive/Index', [
            'posts' => $posts,
        ]);
    }

    public function repost(Request $request, Post $post)
    {
        $post->state = 'Active';
        $post->save();

        UserLog::create([
            'user_id' => Auth::id(),
            'action' => 'Reposted Archived Post',
        ]);

        return redirect()->back()->with('success', 'Posted successfully.');
    }
}
