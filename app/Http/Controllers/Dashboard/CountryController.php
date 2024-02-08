<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Country\CountryInterface;
use App\Http\Requests\Dashboard\Country\StoreRequest;
use App\Http\Requests\Dashboard\Country\UpdateRequest;

class CountryController extends Controller
{
    protected $country;

    public function __construct(CountryInterface $country)
    {
        $this->country = $country;
    }



    public function index(Request $request)
    {
        return $this->country->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->country->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->country->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->country->destroy($request);
    }
}
