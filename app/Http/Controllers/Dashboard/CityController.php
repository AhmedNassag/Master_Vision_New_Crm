<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\City\CityInterface;
use App\Http\Requests\Dashboard\City\StoreRequest;
use App\Http\Requests\Dashboard\City\UpdateRequest;

class CityController extends Controller
{
    protected $city;

    public function __construct(CityInterface $city)
    {
        $this->city = $city;
        $this->middleware('permission:عرض المدن', ['only' => ['index']]);
        $this->middleware('permission:إضافة المدن', ['only' => ['store']]);
        $this->middleware('permission:تعديل المدن', ['only' => ['update']]);
        $this->middleware('permission:حذف المدن', ['only' => ['destroy']]);
    }



    public function index(Request $request)
    {
        return $this->city->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->city->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->city->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->city->destroy($request);
    }
}
