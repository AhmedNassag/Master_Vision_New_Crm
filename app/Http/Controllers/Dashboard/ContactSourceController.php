<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\ContactSource\ContactSourceInterface;
use App\Http\Requests\Dashboard\ContactSource\StoreRequest;
use App\Http\Requests\Dashboard\ContactSource\UpdateRequest;

class ContactSourceController extends Controller
{
    protected $contactSource;

    public function __construct(ContactSourceInterface $contactSource)
    {
        $this->contactSource = $contactSource;
    }



    public function index(Request $request)
    {
        return $this->contactSource->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->contactSource->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->contactSource->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->contactSource->destroy($request);
    }
}
