<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\UserLog;

class DashboardController extends Controller
{
    public function index()
    {
        // Check if the authenticated user's role is 4
        if (auth()->user()->role_id == 4) {
            return Inertia::location(route('gwa.index'));
        }

        // Fetch posts
        $post = Post::where('state', 'Active')
            ->orderBy('created_at', 'desc')
            ->get();

        // Fetch logs
        $logs = UserLog::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->where('action', 'Page Visit')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date', 'asc')
            ->get();

        // Fetch today's visitors
        $currentDateVisitors = UserLog::where('action', 'Page Visit')
            ->whereDate('created_at', Carbon::today())
            ->count();

        // Render the dashboard view
        return Inertia::render('Dashboard', [
            'post' => $post,
            'logs' => $logs,
            'currentDateVisitors' => $currentDateVisitors,
        ]);
    }
}
