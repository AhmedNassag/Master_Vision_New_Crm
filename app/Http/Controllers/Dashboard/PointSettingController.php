<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\PointSetting\PointSettingInterface;
use App\Http\Requests\Dashboard\PointSetting\StoreRequest;
use App\Http\Requests\Dashboard\PointSetting\UpdateRequest;

class PointSettingController extends Controller
{
    protected $pointSetting;

    public function __construct(PointSettingInterface $pointSetting)
    {
        $this->pointSetting = $pointSetting;
    }



    public function index(Request $request)
    {
        return $this->pointSetting->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->pointSetting->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->pointSetting->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->pointSetting->destroy($request);
    }
}
