<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Carousell;
use App\Models\Alumni;
use App\Models\Banner;
use App\Models\Office;
use App\Models\OnLoadBanner;

class MainController extends Controller
{
    public function index()
    {
        $banners = Banner::where('state', true)->get();
        $onLoadBanners = OnLoadBanner::where('state', true)->get();
        $carousells = Carousell::orderBy('order', 'asc')->get();
        $posts = Post::where('category', 'News')
            ->where('state', 'Active')
            ->get();
        $announcements = Post::whereIn('category', ['Announcement', 'Deans'])
            ->where('state', 'Active')
            ->orderBy('created_at', 'desc')
            ->get();
        $events = Post::where('category', 'Events')
            ->where('state', 'Active')
            ->orderBy('created_at', 'desc')
            ->first();

        $alumni = Alumni::where('status', true)->get();

        return Inertia::render('Main/Home/Index', [
            'posts' => $posts,
            'carousells' => $carousells,
            'alumni' => $alumni,
            'banners' => $banners,
            'events' => $events,
            'onLoadBanners' => $onLoadBanners,
            'announcements' => $announcements,
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $allPost = Post::where('category', 'News')->where('state', 'Active')->get();
        return Inertia::render('Main/Home/Post/Show', [
            'post' => $post,
            'allPost' => $allPost
        ]);
    }

    public function showAnnouncement($id)
    {
        $post = Post::findOrFail($id);
        $announcements = Post::where('category', 'Announcement')->where('state', 'Active')->get();
        return Inertia::render('Main/Home/Announcement/Show', [
            'post' => $post,
            'announcements' => $announcements
        ]);
    }

    public function departmentList()
    {
        $offices = Office::select('id', 'office_name', 'image', 'office_location')
                            ->where('category', 'Department')
                            ->orderBy('office_name', 'asc')
                            ->get();

        $facilities = Office::select('id', 'office_name', 'image', 'office_location')
                            ->where('category', 'Facilities')
                            ->orderBy('office_name', 'asc')
                            ->get();

        return Inertia::render('Main/Administration/Departments/Index', [
            'offices' => $offices, 'facilities' => $facilities]);
    }

    public function departmentShow($id)
    {
        $offices = Office::findOrFail($id);
        $officesList = Office::select('id', 'office_name')
                            ->orderBy('office_name', 'asc')
                            ->get();

        return Inertia::render('Main/Administration/Departments/Show', [
            'offices' => $offices,
            'officesList' => $officesList
        ]);
    }

    public function events()
    {
        $events = Post::whereIn('category', ['Events'])
        ->where('state', 'Active')
        ->orderBy('created_at', 'desc')
        ->get();

    return Inertia::render('Main/EventsCalendar/UpcommingEvents/Index', [
        'events' => $events,
    ]);
    }

    public function allAnnouncement()
    {
        $announcements = Post::whereIn('category', ['Announcement'])
        ->where('state', 'Active')
        ->orderBy('created_at', 'desc')
        ->get();

        return Inertia::render('Main/Home/Announcement/allAnnouncement', [
            'announcements' => $announcements,
        ]);
    }

    public function allNews()
    {
        $news = Post::whereIn('category', ['News'])
        ->where('state', 'Active')
        ->orderBy('created_at', 'desc')
        ->get();

        return Inertia::render('Main/Home/Post/allNews', [
            'allNews' => $news,
        ]);
    }
}