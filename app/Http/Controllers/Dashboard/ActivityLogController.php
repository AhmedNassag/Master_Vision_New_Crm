<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\ActivityLog\ActivityLogInterface;

class ActivityLogController extends Controller
{
    protected $activityLog;

    public function __construct(ActivityLogInterface $activityLog)
    {
        $this->activityLog = $activityLog;
    }



    public function index(Request $request)
    {
        return $this->activityLog->index($request);
    }
}
