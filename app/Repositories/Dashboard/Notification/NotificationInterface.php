<?php

namespace App\Repositories\Dashboard\Notification;

use Illuminate\Http\Request;

interface NotificationInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

    public function todayReminders();

    public function monthReminders();

    public function delayReminders();

    // public function remindersChangeStatus($request,$id);
    public function remindersChangeStatus($id);

    public function todayFollowUps($request);

    public function monthFollowUps();

    public function todayBirthdays($request);

}
