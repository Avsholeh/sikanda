<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Services\ActivityLogService;

class ActivityLogController extends Controller
{
    public function index()
    {
        $activityLogs = ActivityLog::paginate(10);
        return view('vendor.voyager.activity_log.index', compact('activityLogs'));
    }

    public function clear(ActivityLogService $activityLogService)
    {
        $activityLogService->empty();
        return redirect()->route('activity_log.index')->with([
            'message' => "Log aktivitas telah berhasil dikosongkan",
            'alert-type' => 'success',
        ]);
    }
}
