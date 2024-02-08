<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Major\MajorInterface;
use App\Http\Requests\Dashboard\Major\StoreRequest;
use App\Http\Requests\Dashboard\Major\UpdateRequest;

class MajorController extends Controller
{
    protected $major;

    public function __construct(MajorInterface $major)
    {
        $this->major = $major;
    }



    public function index(Request $request)
    {
        return $this->major->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->major->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->major->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->major->destroy($request);
    }



    public function majorByIndustryId($id)
    {
        return $this->major->majorByIndustryId($id);
    }
}
