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

        $todayStart = Carbon::today();
        $todayEnd = Carbon::tomorrow();
        $sevenDaysAgo = Carbon::today()->subDays(6);

        $post = Post::where('state', 'Active')
            ->orderBy('created_at', 'desc')
            ->get();

        $uniqueVisitorsToday = PageAnalytic::where('is_bot', false)
            ->where('visited_at', '>=', $todayStart)
            ->where('visited_at', '<', $todayEnd)
            ->distinct('visitor_id')
            ->count('visitor_id');

        $totalVisitsToday = PageAnalytic::where('is_bot', false)
            ->where('visited_at', '>=', $todayStart)
            ->where('visited_at', '<', $todayEnd)
            ->count();

        $dailyVisits = PageAnalytic::select(
                DB::raw('DATE(visited_at) as date'),
                DB::raw('COUNT(DISTINCT visitor_id) as unique_count'),
                DB::raw('COUNT(*) as total_count')
            )
            ->where('is_bot', false)
            ->where('visited_at', '>=', $sevenDaysAgo)
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
            ->where('visited_at', '>=', $sevenDaysAgo)
            ->groupBy('route_name', 'route_path')
            ->orderByDesc('unique_visitors')
            ->take(10)
            ->get();

        $botVisitsFiltered = PageAnalytic::where('is_bot', true)
            ->where('visited_at', '>=', $todayStart)
            ->where('visited_at', '<', $todayEnd)
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
        $query = PageAnalytic::where('visited_at', '<=', $fiveDaysAgo);

        do {
            $ids = (clone $query)->limit(1000)->pluck('id');
            if ($ids->isEmpty()) break;
            PageAnalytic::whereIn('id', $ids)->delete();
        } while (true);

        UserLog::create([
            'action' => 'Prune Analytics',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard');
    }
}
