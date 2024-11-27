<?php

namespace App\Http\Controllers;

use App\Models\UserLog;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UserLogController extends Controller
{
    /**
     * Display a list of user logs.
     */
    public function index(Request $request): Response
{
    // Fetch logs excluding 'Page Visit' actions and eager load the user relationship
    $logs = UserLog::with(['user:id,name']) // Eager load 'user' with only 'id' and 'name'
                   ->where('action', '!=', 'Page Visit') // Exclude 'Page Visit'
                   ->latest() // Order by most recent log
                   ->paginate(10); // Paginate results

    return Inertia::render('UserLogs/Index', [
        'logs' => $logs,
    ]);
}
}

