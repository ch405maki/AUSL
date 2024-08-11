<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Carousell;
use App\Models\Alumni;
use App\Models\Banner;
use App\Models\OnLoadBanner;

class MainController extends Controller
{
    public function index()
    {
        $banners = Banner::where('state', true)->get();
        $onLoadBanners = OnLoadBanner::where('state', true)->get();
        $carousells = Carousell::orderBy('created_at', 'desc')->get(); 
        $posts = Post::where('category', 'News')->get();
        $announcements = Post::where('category', 'Announcement')->get();
        $alumni = Alumni::where('status', true)->get();

        return Inertia::render('Main/Home/Index', [
            'posts' => $posts,
            'carousells' => $carousells,
            'alumni' => $alumni,
            'banners' => $banners,
            'onLoadBanners' => $onLoadBanners,
            'announcements' => $announcements,
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $allPost = Post::all();
        return Inertia::render('Main/Home/Post/Show', [
            'post' => $post,
            'allPost' => $allPost
        ]);
    }

    public function showAnnouncement($id)
    {
        $post = Post::findOrFail($id);
        $allPost = Post::all();
        return Inertia::render('Main/Home/Announcement/Show', [
            'post' => $post,
            'allPost' => $allPost
        ]);
    }
}