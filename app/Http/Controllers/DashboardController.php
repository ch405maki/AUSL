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
        $post = Post::where('state', 'Active')
            ->orderBy('created_at', 'desc')
            ->get();

        $logs = UserLog::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->where('action', 'Page Visit')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date', 'asc')
            ->get();

        $currentDateVisitors = UserLog::where('action', 'Page Visit')
            ->whereDate('created_at', Carbon::today())
            ->count();

        return Inertia::render('Dashboard', [
            'post' => $post,
            'logs' => $logs,
            'currentDateVisitors' => $currentDateVisitors,
        ]);
    }

}
