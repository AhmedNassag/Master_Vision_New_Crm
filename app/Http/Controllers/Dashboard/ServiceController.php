<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Service\ServiceInterface;
use App\Http\Requests\Dashboard\Service\StoreRequest;
use App\Http\Requests\Dashboard\Service\UpdateRequest;

class ServiceController extends Controller
{
    protected $service;

    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
        $this->middleware('permission:عرض الأنشطة الفرعية', ['only' => ['index']]);
        $this->middleware('permission:إضافة الأنشطة الفرعية', ['only' => ['store']]);
        $this->middleware('permission:تعديل الأنشطة الفرعية', ['only' => ['update']]);
        $this->middleware('permission:حذف الأنشطة الفرعية', ['only' => ['destroy']]);
    }



    public function index(Request $request)
    {
        return $this->service->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->service->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->service->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->service->destroy($request);
    }



    public function serviceByInterestId($id)
    {
        return $this->service->serviceByInterestId($id);
    }
}
