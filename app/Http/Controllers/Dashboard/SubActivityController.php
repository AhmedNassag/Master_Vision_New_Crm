<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\SubActivity\SubActivityInterface;
use App\Http\Requests\Dashboard\SubActivity\StoreRequest;
use App\Http\Requests\Dashboard\SubActivity\UpdateRequest;

class SubActivityController extends Controller
{
    protected $subActivity;

    public function __construct(SubActivityInterface $subActivity)
    {
        $this->subActivity = $subActivity;
    }



    public function index(Request $request)
    {
        return $this->subActivity->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->subActivity->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->subActivity->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->subActivity->destroy($request);
    }



    public function subActivityByActivityId($id)
    {
        return $this->subActivity->subActivityByActivityId($id);
    }
}
