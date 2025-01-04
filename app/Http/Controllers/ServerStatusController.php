<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class ServerStatusController extends Controller
{
    public function status()
    {
        $cpuLoad = sys_getloadavg();

        $memoryUsage = memory_get_usage(true);
        $memoryPeakUsage = memory_get_peak_usage(true);

        $diskTotalSpace = disk_total_space("/");
        $diskFreeSpace = disk_free_space("/");

        return response()->json([
            'cpu' => [
                '1_min' => round($cpuLoad[0] * 100, 2), // Convert to percentage
            ],
            'memory' => [
                'current' => $memoryUsage, // Current usage in bytes
                'peak' => $memoryPeakUsage, // Peak usage in bytes
            ],
            'disk' => [
                'total' => $diskTotalSpace,
                'free' => $diskFreeSpace,
                'used_percentage' => round((($diskTotalSpace - $diskFreeSpace) / $diskTotalSpace) * 100, 2),
            ],
        ]);
    }

}
