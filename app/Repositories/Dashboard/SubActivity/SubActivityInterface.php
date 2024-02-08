<?php

namespace App\Repositories\Dashboard\SubActivity;

interface SubActivityInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

    public function subActivityByActivityId($id);

}
