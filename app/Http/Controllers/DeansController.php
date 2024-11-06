<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class DeansController extends Controller
{
    public function index()
    {
        $deans = Post::whereIn('category', ['Deans'])
            ->where('state', 'Active')
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Main/DeansCorner/Corner/Index', ['deans' => $deans]);
    }

}
