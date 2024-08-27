<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Inertia\Inertia;

class ArchiveController extends Controller
{
    public function index()
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

        return redirect()->back()->with('success', 'Posted successfully.');
    }
}
