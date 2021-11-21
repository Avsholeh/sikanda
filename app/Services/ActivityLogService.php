<?php

namespace App\Services;

use App\Models\ActivityLog;

class ActivityLogService
{
    public function post($action, $data, $ipAddr, $hostname)
    {
        ActivityLog::insert([
            'action' => $action,
            'data' => json_encode($data),
            'ip_addr' => $ipAddr,
            'hostname' => $hostname,
        ]);
    }
}