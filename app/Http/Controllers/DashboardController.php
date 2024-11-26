<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index(){
    
    $post = Post::whereIn('category', ['News'])
    ->where('state', 'Active')
    ->orderBy('created_at', 'desc')
    ->get();

    return Inertia::render('Dashboard', ['post' => $post]);

    }
}
