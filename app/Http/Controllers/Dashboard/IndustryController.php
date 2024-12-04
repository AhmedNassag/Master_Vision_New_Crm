<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Industry\IndustryInterface;
use App\Http\Requests\Dashboard\Industry\StoreRequest;
use App\Http\Requests\Dashboard\Industry\UpdateRequest;

class IndustryController extends Controller
{
    protected $industry;

    public function __construct(IndustryInterface $industry)
    {
        $this->industry = $industry;
        $this->middleware('permission:عرض قطاعات الأعمال', ['only' => ['index']]);
        $this->middleware('permission:إضافة قطاعات الأعمال', ['only' => ['store']]);
        $this->middleware('permission:تعديل قطاعات الأعمال', ['only' => ['update']]);
        $this->middleware('permission:حذف قطاعات الأعمال', ['only' => ['destroy']]);
    }



    public function index(Request $request)
    {
        return $this->industry->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->industry->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->industry->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->industry->destroy($request);
    }
}
