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
        // Fetch logs and eager load the user relationship to get user name
        $logs = UserLog::with('user:id,name')  // Only fetch the 'id' and 'name' columns of the user
                        ->latest()           // Order by the most recent log
                        ->paginate(10);      // Pagination

        return Inertia::render('UserLogs/Index', [
            'logs' => $logs,
        ]);
    }
}

