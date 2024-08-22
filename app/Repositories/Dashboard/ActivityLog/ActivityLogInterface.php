<?php

namespace App\Repositories\Dashboard\ActivityLog;

interface ActivityLogInterface
{

    public function index($request);

    public function show($id);
    
}
