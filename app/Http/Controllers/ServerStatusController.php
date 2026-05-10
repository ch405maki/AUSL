<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ServerStatusController extends Controller
{
    public function status()
    {
        $start = microtime(true);

        $data = Cache::remember('server_status', 15, function () {
            return $this->collectMetrics();
        });

        $data['response_time_ms'] = round((microtime(true) - $start) * 1000, 1);

        return response()->json($data);
    }

    protected function collectMetrics(): array
    {
        $cpuLoad = function_exists('sys_getloadavg') ? sys_getloadavg() : [0, 0, 0];
        $memoryUsage = memory_get_usage(true);
        $memoryPeakUsage = memory_get_peak_usage(true);
        $diskTotalSpace = disk_total_space("/") ?: 1;
        $diskFreeSpace = disk_free_space("/") ?: 0;

        return [
            'cpu' => [
                '1_min' => round($cpuLoad[0] * 100, 2),
                '5_min' => round($cpuLoad[1] * 100, 2),
                '15_min' => round($cpuLoad[2] * 100, 2),
            ],
            'memory' => [
                'current' => $memoryUsage,
                'peak' => $memoryPeakUsage,
            ],
            'disk' => [
                'total' => $diskTotalSpace,
                'free' => $diskFreeSpace,
                'used_percentage' => round((($diskTotalSpace - $diskFreeSpace) / $diskTotalSpace) * 100, 2),
            ],
            'uptime_seconds' => $this->uptimeSeconds(),
            'db_connected' => $this->dbConnected(),
            'throughput' => $this->requestThroughput(),
        ];
    }

    protected function uptimeSeconds(): int
    {
        $bootedAt = Cache::rememberForever('server_booted_at', function () {
            return now();
        });

        return (int) $bootedAt->diffInSeconds(now());
    }

    protected function dbConnected(): bool
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Throwable) {
            return false;
        }
    }

    protected function requestThroughput(): int
    {
        return \App\Models\PageAnalytic::where('is_bot', false)
            ->where('visited_at', '>=', now()->subMinute())
            ->count();
    }
}
