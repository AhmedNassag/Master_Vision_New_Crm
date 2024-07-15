<?php

namespace App\Repositories\Dashboard\Notification;

interface NotificationInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

    public function todayReminders();

    public function monthReminders();

    public function remindersChangeStatus($id);

}
