<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Notification\NotificationInterface;
use App\Http\Requests\Dashboard\Notification\StoreRequest;
use App\Http\Requests\Dashboard\Notification\UpdateRequest;

class NotificationController extends Controller
{
    protected $notification;

    public function __construct(NotificationInterface $notification)
    {
        $this->notification = $notification;
    }



    public function index(Request $request)
    {
        return $this->notification->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->notification->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->notification->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->notification->destroy($request);
    }
    


    public function todayReminders()
    {
        return $this->notification->todayReminders();
    }



    public function monthReminders()
    {
        return $this->notification->monthReminders();
    }

}
