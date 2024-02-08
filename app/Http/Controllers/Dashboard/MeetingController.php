<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Meeting\MeetingInterface;
use App\Http\Requests\Dashboard\Meeting\StoreRequest;
use App\Http\Requests\Dashboard\Meeting\UpdateRequest;

class MeetingController extends Controller
{
    protected $meeting;

    public function __construct(MeetingInterface $meeting)
    {
        $this->meeting = $meeting;
    }



    public function index(Request $request)
    {
        return $this->meeting->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->meeting->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->meeting->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->meeting->destroy($request);
    }
}
