<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Carousell;
use App\Models\Alumni;

class MainController extends Controller
{
    public function index()
    {
        $carousells = Carousell::all();
        $posts = Post::all();
        // Only retrieve alumni with status true
        $alumni = Alumni::where('status', true)->get();

        return Inertia::render('Main/Index', [
            'posts' => $posts,
            'carousells' => $carousells,
            'alumni' => $alumni,
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
}