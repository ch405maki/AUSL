<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Carousell;
use App\Models\Alumni;
use App\Models\Banner;

class MainController extends Controller
{
    public function index()
    {
        $banners = Banner::where('state', true)->get();
        $carousells = Carousell::all();
        $posts = Post::all();
        // Only retrieve alumni with status true
        $alumni = Alumni::where('status', true)->get();

        return Inertia::render('Main/Index', [
            'posts' => $posts,
            'carousells' => $carousells,
            'alumni' => $alumni,
            'banners' => $banners,
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id); // Retrieve the post by ID
        $allPost = Post::all();
        return Inertia::render('Main/Post/Show', [
            'post' => $post,
            'allPost' => $allPost
        ]);
    }
    public function showAnnouncement()
    {
        return Inertia::render('Main/Announcement/Show');
    }
}