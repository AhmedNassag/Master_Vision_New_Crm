<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Branch\BranchInterface;
use App\Http\Requests\Dashboard\Branch\StoreRequest;
use App\Http\Requests\Dashboard\Branch\UpdateRequest;

class BranchController extends Controller
{
    protected $branch;

    public function __construct(BranchInterface $branch)
    {
        $this->branch = $branch;
        $this->middleware('permission:عرض الفروع', ['only' => ['index']]);
        $this->middleware('permission:إضافة الفروع', ['only' => ['store']]);
        $this->middleware('permission:تعديل الفروع', ['only' => ['update']]);
        $this->middleware('permission:حذف الفروع', ['only' => ['destroy']]);
    }



    public function index(Request $request)
    {
        return $this->branch->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->branch->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->branch->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->branch->destroy($request);
    }
}
