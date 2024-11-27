<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class ServerStatusController extends Controller
{
    public function status()
    {
        // Fetch CPU load
        $cpuLoad = sys_getloadavg(); // Returns an array of load averages

        // Fetch memory usage
        $memoryUsage = memory_get_usage(true); // In bytes
        $memoryPeakUsage = memory_get_peak_usage(true);

        // Disk usage
        $diskTotalSpace = disk_total_space("/");
        $diskFreeSpace = disk_free_space("/");

        return response()->json([
            'cpu' => [
                '1_min' => $cpuLoad[0],
                '5_min' => $cpuLoad[1],
                '15_min' => $cpuLoad[2],
            ],
            'memory' => [
                'current' => $this->formatBytes($memoryUsage),
                'peak' => $this->formatBytes($memoryPeakUsage),
            ],
            'disk' => [
                'total' => $this->formatBytes($diskTotalSpace),
                'free' => $this->formatBytes($diskFreeSpace),
                'used_percentage' => round((($diskTotalSpace - $diskFreeSpace) / $diskTotalSpace) * 100, 2),
            ],
        ]);
    }

    private function formatBytes($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $power = $bytes > 0 ? floor(log($bytes, 1024)) : 0;

        return number_format($bytes / pow(1024, $power), 2) . ' ' . $units[$power];
    }
}

