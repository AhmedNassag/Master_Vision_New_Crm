<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Nationality\NationalityInterface;
use App\Http\Requests\Dashboard\Nationality\StoreRequest;
use App\Http\Requests\Dashboard\Nationality\UpdateRequest;

class NationalityController extends Controller
{
    protected $nationality;

    public function __construct(NationalityInterface $nationality)
    {
        $this->nationality = $nationality;
    }



    public function index(Request $request)
    {
        return $this->nationality->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->nationality->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->nationality->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->nationality->destroy($request);
    }
}
