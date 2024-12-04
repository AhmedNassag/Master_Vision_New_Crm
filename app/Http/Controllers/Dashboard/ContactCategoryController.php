<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\ContactCategory\ContactCategoryInterface;
use App\Http\Requests\Dashboard\ContactCategory\StoreRequest;
use App\Http\Requests\Dashboard\ContactCategory\UpdateRequest;

class ContactCategoryController extends Controller
{
    protected $contactCategory;

    public function __construct(ContactCategoryInterface $contactCategory)
    {
        $this->contactCategory = $contactCategory;
        $this->middleware('permission:عرض فئات جهات الإتصال', ['only' => ['index']]);
        $this->middleware('permission:إضافة فئات جهات الإتصال', ['only' => ['store']]);
        $this->middleware('permission:تعديل فئات جهات الإتصال', ['only' => ['update']]);
        $this->middleware('permission:حذف فئات جهات الإتصال', ['only' => ['destroy']]);
    }



    public function index(Request $request)
    {
        return $this->contactCategory->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->contactCategory->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->contactCategory->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->contactCategory->destroy($request);
    }
}
