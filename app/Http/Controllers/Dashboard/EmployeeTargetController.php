<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\EmployeeTarget\EmployeeTargetInterface;
use App\Http\Requests\Dashboard\EmployeeTarget\StoreRequest;
use App\Http\Requests\Dashboard\EmployeeTarget\UpdateRequest;

class EmployeeTargetController extends Controller
{
    protected $employeeTarget;

    public function __construct(EmployeeTargetInterface $employeeTarget)
    {
        $this->employeeTarget = $employeeTarget;
        $this->middleware('permission:عرض تارجت الموظفين', ['only' => ['index']]);
        $this->middleware('permission:إضافة تارجت الموظفين', ['only' => ['store']]);
        $this->middleware('permission:تعديل تارجت الموظفين', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف تارجت الموظفين', ['only' => ['destroy']]);
    }



    public function index(Request $request)
    {
        return $this->employeeTarget->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->employeeTarget->store($request);
    }



    public function edit($id)
    {
        return $this->employeeTarget->edit($id);
    }



    public function update(UpdateRequest $request)
    {
        return $this->employeeTarget->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->employeeTarget->destroy($request);
    }

}
