<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\JobTitle\JobTitleInterface;
use App\Http\Requests\Dashboard\JobTitle\StoreRequest;
use App\Http\Requests\Dashboard\JobTitle\UpdateRequest;

class JobTitleController extends Controller
{
    protected $jobTitle;

    public function __construct(JobTitleInterface $jobTitle)
    {
        $this->jobTitle = $jobTitle;
        $this->middleware('permission:عرض المسميات الوظيفية', ['only' => ['index']]);
        $this->middleware('permission:إضافة المسميات الوظيفية', ['only' => ['store']]);
        $this->middleware('permission:تعديل المسميات الوظيفية', ['only' => ['update']]);
        $this->middleware('permission:حذف المسميات الوظيفية', ['only' => ['destroy']]);
    }



    public function index(Request $request)
    {
        return $this->jobTitle->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->jobTitle->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->jobTitle->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->jobTitle->destroy($request);
    }
}
