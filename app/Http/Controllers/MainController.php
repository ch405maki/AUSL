<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Inertia\Inertia;
use App\Models\Post;
use App\Models\Carousell;
use App\Models\Alumni;
use App\Models\Banner;
use App\Models\Office;
use App\Models\OnLoadBanner;
use App\Models\UserLog;


class MainController extends Controller
{
    public function index()
    {
        $banners = Banner::where('state', true)->get();
        $onLoadBanners = OnLoadBanner::where('state', true)->get();
        $carousells = Carousell::orderBy('order', 'asc')->get();
        $posts = Post::where('category', 'News')
            ->where('state', 'Active')
            ->latest()
            ->take(6)
            ->get();
        $announcements = Post::whereIn('category', ['Announcement', 'Deans', 'Exam'])
            ->where('state', 'Active')
            ->latest()
            ->take(6)
            ->get();

        $events = Post::where('category', 'Events')
            ->where('state', 'Active')
            ->orderBy('created_at', 'desc')
            ->first();

        $alumni = Alumni::where('status', true)->get();

        UserLog::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'action' => 'Page Visit',
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
        ]);
        

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
        $allPost = Post::where('category', 'News')
                        ->where('state', 'Active')
                        ->latest() // Add this line
                        ->get();
        return Inertia::render('Main/Home/Post/Show', [
            'post' => $post,
            'allPost' => $allPost
        ]);
    }

    public function showAnnouncement($id)
    {
        $post = Post::findOrFail($id);
        $announcements = Post::where('category', 'Announcement')->where('state', 'Active')->latest()->get();
        return Inertia::render('Main/Home/Announcement/Show', [
            'post' => $post,
            'announcements' => $announcements
        ]);
    }

    public function showDeansAnnouncement($id)
    {
        // Fetch the specific post by ID
        $post = Post::findOrFail($id);
    
        // Fetch active Dean's announcements, sorted by latest first
        $deans = Post::whereIn('category', ['Exam', 'Deans'])
                    ->where('state', 'Active')
                    ->orderBy('created_at', 'desc')
                    ->get();
        
        // Render the view with the fetched data
        return Inertia::render('Main/DeansCorner/Corner/Show', [
            'post' => $post,
            'deans' => $deans,
        ]);
    }

    public function showExamAnnouncement($id)
    {
        // Fetch the specific post by ID
        $post = Post::findOrFail($id);

        // Fetch active Dean's announcements, sorted by latest first
        $exam = Post::where('category', 'underExam')
                    ->where('state', 'Active')
                    ->orderBy('created_at', 'desc')
                    ->get();

        // Fetch posts belonging to either 'Exam' or 'Deans' category
        $deans = Post::whereIn('category', ['Exam', 'Deans'])
                    ->where('state', 'Active')
                    ->orderBy('created_at', 'desc')
                    ->get();

        // Render the view with the fetched data
        return Inertia::render('Main/DeansCorner/Exam/Show', [
            'post' => $post,
            'exam' => $exam,
            'deans' => $deans,
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

    public function log (){
        // Check if the log was already created in the current session
        UserLog::create([
            'action' => 'Page Visit',
        ]);

        return redirect()->back();
    }
}