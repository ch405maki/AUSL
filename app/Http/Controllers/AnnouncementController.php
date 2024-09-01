<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Inertia\Inertia;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $posts = Post::where('category', 'Announcement')
            ->where('state', 'Active')
            ->get();
        return Inertia::render('Announcement/Index', ['posts' => $posts]);
    }
}
