<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Department\DepartmentInterface;
use App\Http\Requests\Dashboard\Department\StoreRequest;
use App\Http\Requests\Dashboard\Department\UpdateRequest;

class DepartmentController extends Controller
{
    protected $department;

    public function __construct(DepartmentInterface $department)
    {
        $this->department = $department;
    }



    public function index(Request $request)
    {
        return $this->department->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->department->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->department->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->department->destroy($request);
    }
}
