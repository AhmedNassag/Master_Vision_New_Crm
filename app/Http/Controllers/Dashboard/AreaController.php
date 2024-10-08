<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Area\AreaInterface;
use App\Http\Requests\Dashboard\Area\StoreRequest;
use App\Http\Requests\Dashboard\Area\UpdateRequest;

class AreaController extends Controller
{
    protected $area;

    public function __construct(AreaInterface $area)
    {
        $this->area = $area;
        $this->middleware('permission:عرض المناطق', ['only' => ['index']]);
        $this->middleware('permission:إضافة المناطق', ['only' => ['store']]);
        $this->middleware('permission:تعديل المناطق', ['only' => ['update']]);
        $this->middleware('permission:حذف المناطق', ['only' => ['destroy']]);
    }



    public function index(Request $request)
    {
        return $this->area->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->area->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->area->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->area->destroy($request);
    }



    public function areaByCityId($id)
    {
        return $this->area->areaByCityId($id);
    }
}
