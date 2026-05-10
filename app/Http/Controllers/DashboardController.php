<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\PageAnalytic;
use App\Models\UserLog;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role_id == 4) {
            return Inertia::location(route('gwa.index'));
        }

        $today = Carbon::today()->toDateString();
        $sevenDaysAgo = Carbon::today()->subDays(6)->toDateString();

        $post = Post::where('state', 'Active')
            ->orderBy('created_at', 'desc')
            ->get();

        $uniqueVisitorsToday = PageAnalytic::where('is_bot', false)
            ->whereDate('visited_at', $today)
            ->distinct('visitor_id')
            ->count('visitor_id');

        $totalVisitsToday = PageAnalytic::where('is_bot', false)
            ->whereDate('visited_at', $today)
            ->count();

        $dailyVisits = PageAnalytic::select(
                DB::raw('DATE(visited_at) as date'),
                DB::raw('COUNT(DISTINCT visitor_id) as unique_count'),
                DB::raw('COUNT(*) as total_count')
            )
            ->where('is_bot', false)
            ->whereDate('visited_at', '>=', $sevenDaysAgo)
            ->groupBy(DB::raw('DATE(visited_at)'))
            ->orderBy('date', 'asc')
            ->get();

        $visitsPerDay = $dailyVisits->map(function ($day) {
            return [
                'date' => $day->date,
                'count' => (int) $day->unique_count,
            ];
        });

        $topPages = PageAnalytic::select(
                'route_name',
                'route_path',
                DB::raw('COUNT(DISTINCT visitor_id) as unique_visitors'),
                DB::raw('COUNT(*) as total_visits')
            )
            ->where('is_bot', false)
            ->whereNotNull('route_name')
            ->where('exclude_from_top_pages', false)
            ->whereDate('visited_at', '>=', $sevenDaysAgo)
            ->groupBy('route_name', 'route_path')
            ->orderByDesc('unique_visitors')
            ->take(10)
            ->get();

        $botVisitsFiltered = PageAnalytic::where('is_bot', true)
            ->whereDate('visited_at', $today)
            ->count();

        return Inertia::render('Dashboard', [
            'post' => $post,
            'uniqueVisitorsToday' => $uniqueVisitorsToday,
            'totalVisitsToday' => $totalVisitsToday,
            'visitsPerDay' => $visitsPerDay,
            'topPages' => $topPages,
            'botVisitsFiltered' => $botVisitsFiltered,
        ]);
    }

    public function clearTopPages()
    {
        PageAnalytic::where('exclude_from_top_pages', false)->update([
            'exclude_from_top_pages' => true,
        ]);

        UserLog::create([
            'action' => 'Clear Top Pages',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard');
    }

    public function pruneAnalytics()
    {
        $fiveDaysAgo = Carbon::now()->subDays(5);

        PageAnalytic::where('visited_at', '<=', $fiveDaysAgo)->delete();

        UserLog::create([
            'action' => 'Prune Analytics',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard');
    }
}
