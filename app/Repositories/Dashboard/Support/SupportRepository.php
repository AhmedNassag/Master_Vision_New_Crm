<?php

namespace App\Repositories\Dashboard\Support;

use App\Models\Blog;
use App\Models\Support;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Dashboard\BaseRepository;
use App\Repositories\Dashboard\Support\SupportInterface;

class SupportRepository extends BaseRepository implements SupportInterface
{
    public function getModel()
    {
        return new Support();
    }

    public function index($request)
    {
        $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

        $data = Support::
        when($request->title != null,function ($q) use($request){
            return $q->where('key','like', '%'.$request->title.'%');
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate($perPage)->appends(request()->query());

        return view('dashboard.Support.index',compact('data'))
        ->with([
            'key'      => $request->key,
            'perPage'   => $perPage,
        ]);
    }

    public function store($request)
    {
        try {
            $inputs = $request->validated();
    
            $data = Blog::create([
                'title'         => $request->title,
                'description'   => $request->description,
            ]);

            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }

            //upload photo
            if ($request->hasFile('media')) {
                $file      = $request->media;
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $file_name = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('blog', $file_name, 'attachments');
                $data->media()->create([
                    'file_path' => asset('attachments/blog/' . $file_name),
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1,
                ]);
            }

            session()->flash('success');
            return redirect()->route('blog.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            $inputs = $request->validated();
            $data   = Blog::findOrFail($request->id);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            $data->update([
                'title'         => $request->title,
                'description'   => $request->description,
            ]);
            // update photo
            if ($request->hasFile('media')) {
                $file = $request->media;
                //remove old photo
                if($data->media) {
                    Storage::disk('attachments')->delete('blog/' . $data->media->file_name);
                    $data->media->delete();
                }
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $file_name = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('blog', $file_name, 'attachments');
                $data->media()->create([
                    'file_path' => asset('attachments/blog/' . $file_name),
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1
                ]);
            }

            session()->flash('success');
            return redirect()->route('blog.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            $data = Blog::findOrFail($request->id);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            if($data->media) {
                Storage::disk('attachments')->delete('blog/' . $data->media->file_name);
                $data->media->delete();
            }
            $data->delete();
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
