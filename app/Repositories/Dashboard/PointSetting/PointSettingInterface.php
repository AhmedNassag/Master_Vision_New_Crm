<?php

namespace App\Repositories\Dashboard\PointSetting;

interface PointSettingInterface
{

    public function index($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
