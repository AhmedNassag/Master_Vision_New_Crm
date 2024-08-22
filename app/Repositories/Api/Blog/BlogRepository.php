<?php

namespace App\Repositories\Api\Blog;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\BlogResource;
use App\Models\Area;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use App\Repositories\Dashboard\BaseRepository;


class BlogRepository extends BaseRepository implements BlogInterface
{
    use ApiResponseTrait;

    public function getModel()
    {
        return new Blog();
    }



    public function index($request)
    {
        // $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

        $data = Blog::all();
        // when($request->title != null,function ($q) use($request){
        //     return $q->where('title','like', '%'.$request->title.'%');
        // })
        // ->when($request->from_date != null,function ($q) use($request){
        //     return $q->whereDate('created_at', '>=', $request->from_date);
        // })
        // ->when($request->to_date != null,function ($q) use($request){
        //     return $q->whereDate('created_at', '<=', $request->to_date);
        // })
        // ->paginate($perPage)->appends(request()->query());

        if(!$data)
        {
            return $this->apiResponse(null, 'Data Not Found!', 404);
        }

        return $this->apiResponse(BlogResource::collection($data), 'The Data Returns Successfully', 200);
    }

    public function show($id)
    {
        $data = Blog::find($id);

        if(!$data) 
        {
            return $this->apiResponse(null, 'Data Not Found!', 404);
        }

        return $this->apiResponse(new BlogResource($data), 'The Data Returns Successfully', 200);
    }



}
