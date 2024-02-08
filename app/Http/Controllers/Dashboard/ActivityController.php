<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Activity\ActivityInterface;
use App\Http\Requests\Dashboard\Activity\StoreRequest;
use App\Http\Requests\Dashboard\Activity\UpdateRequest;

class ActivityController extends Controller
{
    protected $activity;

    public function __construct(ActivityInterface $activity)
    {
        $this->activity = $activity;
    }



    public function index(Request $request)
    {
        return $this->activity->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->activity->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->activity->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->activity->destroy($request);
    }
}
