<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Repositories\Dashboard\Tag\TagInterface;
use App\Http\Requests\Dashboard\Tag\StoreRequest;
use App\Http\Requests\Dashboard\Tag\UpdateRequest;

class TagController extends Controller
{
    protected $tag;

    public function __construct(TagInterface $tag)
    {
        $this->tag = $tag;
        // $this->middleware('permission:عرض الدول', ['only' => ['index']]);
        // $this->middleware('permission:إضافة الدول', ['only' => ['store']]);
        // $this->middleware('permission:تعديل الدول', ['only' => ['update']]);
        // $this->middleware('permission:حذف الدول', ['only' => ['destroy']]);
    }



    public function index(Request $request)
    {
        return $this->tag->index($request);
    }



    public function store(StoreRequest $request)
    {
        return $this->tag->store($request);
    }



    public function update(UpdateRequest $request)
    {
        return $this->tag->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->tag->destroy($request);
    }
}
