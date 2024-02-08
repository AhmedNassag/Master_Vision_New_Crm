<?php

namespace App\Repositories\Dashboard\Meeting;

interface MeetingInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
