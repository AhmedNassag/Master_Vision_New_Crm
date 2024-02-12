<?php

namespace App\Repositories\Dashboard\Customer;


use Carbon\Carbon;
use App\Models\Customer;
use App\Models\ContactCompletion;
use App\Observers\ContactDataObserver;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Imports\CustomersImport;
use App\Models\Activity;
use App\Models\Area;
use App\Models\Campaign;
use App\Models\City;
use App\Models\Contact;
use App\Models\ContactSource;
use App\Models\Industry;
use App\Models\Interest;
use App\Models\ReorderReminder;
use App\Models\Attachment;
use App\Models\Invoice;
use App\Models\Major;
use App\Services\PointAdditionService;
use Maatwebsite\Excel\Facades\Excel;



class CustomerRepository implements CustomerInterface
{
    public function index($request)
    {
        if(Auth::user()->roles_name[0] == "Admin")
        {
            $data = Customer::
            when($request->name != null,function ($q) use($request){
                return $q->where('name','like', '%'.$request->name.'%');
            })
            ->when($request->mobile != null,function ($q) use($request){
                return $q->where('mobile','like', '%'.$request->mobile.'%');
            })
            ->when($request->birth_date != null,function ($q) use($request){
                return $q->where('birth_date','like', '%'.$request->birth_date.'%');
            })
            ->when($request->gender != null,function ($q) use($request){
                return $q->where('gender','like', '%'.$request->gender.'%');
            })
            ->when($request->contact_source_id != null,function ($q) use($request){
                return $q->where('contact_source_id',$request->contact_source_id);
            })
            ->when($request->activity_id != null,function ($q) use($request){
                return $q->where('activity_id',$request->activity_id);
            })
            ->when($request->interest_id != null,function ($q) use($request){
                return $q->where('interest_id',$request->interest_id);
            })
            ->when($request->city_id != null,function ($q) use($request){
                return $q->where('city_id',$request->city_id);
            })
            ->when($request->area_id != null,function ($q) use($request){
                return $q->where('area_id',$request->area_id);
            })
            ->when($request->industry_id != null,function ($q) use($request){
                return $q->where('industry_id',$request->industry_id);
            })
            ->when($request->major_id != null,function ($q) use($request){
                return $q->where('major_id',$request->major_id);
            })
            ->when($request->from_date != null,function ($q) use($request){
                return $q->whereDate('created_at', '>=', $request->from_date);
            })
            ->when($request->to_date != null,function ($q) use($request){
                return $q->whereDate('created_at', '<=', $request->to_date);
            })
            ->when($request->status != null,function ($q) use($request){
                return $q->where('status',$request->status);
            })
            ->when($request->is_active != null,function ($q) use($request){
                return $q->where('is_active',$request->is_active);
            })
            ->orderBy('id', 'desc')
            ->paginate(config('myConfig.paginationCount'));
        }
        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
        {
            $data = Customer::
            whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
            ->when($request->name != null,function ($q) use($request){
                return $q->where('name','like', '%'.$request->name.'%');
            })
            ->when($request->mobile != null,function ($q) use($request){
                return $q->where('mobile','like', '%'.$request->mobile.'%');
            })
            ->when($request->birth_date != null,function ($q) use($request){
                return $q->where('birth_date','like', '%'.$request->birth_date.'%');
            })
            ->when($request->gender != null,function ($q) use($request){
                return $q->where('gender','like', '%'.$request->gender.'%');
            })
            ->when($request->contact_source_id != null,function ($q) use($request){
                return $q->where('contact_source_id',$request->contact_source_id);
            })
            ->when($request->activity_id != null,function ($q) use($request){
                return $q->where('activity_id',$request->activity_id);
            })
            ->when($request->interest_id != null,function ($q) use($request){
                return $q->where('interest_id',$request->interest_id);
            })
            ->when($request->city_id != null,function ($q) use($request){
                return $q->where('city_id',$request->city_id);
            })
            ->when($request->area_id != null,function ($q) use($request){
                return $q->where('area_id',$request->area_id);
            })
            ->when($request->industry_id != null,function ($q) use($request){
                return $q->where('industry_id',$request->industry_id);
            })
            ->when($request->major_id != null,function ($q) use($request){
                return $q->where('major_id',$request->major_id);
            })
            ->when($request->from_date != null,function ($q) use($request){
                return $q->whereDate('created_at', '>=', $request->from_date);
            })
            ->when($request->to_date != null,function ($q) use($request){
                return $q->whereDate('created_at', '<=', $request->to_date);
            })
            ->when($request->status != null,function ($q) use($request){
                return $q->where('status',$request->status);
            })
            ->when($request->is_active != null,function ($q) use($request){
                return $q->where('is_active',$request->is_active);
            })
            ->orderBy('id', 'desc')
            ->paginate(config('myConfig.paginationCount'));
        }
        else
        {
            $data = Customer::
            where('created_by', auth()->user()->employee->id)
            ->when($request->name != null,function ($q) use($request){
                return $q->where('name','like', '%'.$request->name.'%');
            })
            ->when($request->mobile != null,function ($q) use($request){
                return $q->where('mobile','like', '%'.$request->mobile.'%');
            })
            ->when($request->birth_date != null,function ($q) use($request){
                return $q->where('birth_date','like', '%'.$request->birth_date.'%');
            })
            ->when($request->gender != null,function ($q) use($request){
                return $q->where('gender','like', '%'.$request->gender.'%');
            })
            ->when($request->contact_source_id != null,function ($q) use($request){
                return $q->where('contact_source_id',$request->contact_source_id);
            })
            ->when($request->activity_id != null,function ($q) use($request){
                return $q->where('activity_id',$request->activity_id);
            })
            ->when($request->interest_id != null,function ($q) use($request){
                return $q->where('interest_id',$request->interest_id);
            })
            ->when($request->city_id != null,function ($q) use($request){
                return $q->where('city_id',$request->city_id);
            })
            ->when($request->area_id != null,function ($q) use($request){
                return $q->where('area_id',$request->area_id);
            })
            ->when($request->industry_id != null,function ($q) use($request){
                return $q->where('industry_id',$request->industry_id);
            })
            ->when($request->major_id != null,function ($q) use($request){
                return $q->where('major_id',$request->major_id);
            })
            ->when($request->from_date != null,function ($q) use($request){
                return $q->whereDate('created_at', '>=', $request->from_date);
            })
            ->when($request->to_date != null,function ($q) use($request){
                return $q->whereDate('created_at', '<=', $request->to_date);
            })
            ->when($request->status != null,function ($q) use($request){
                return $q->where('status',$request->status);
            })
            ->when($request->is_active != null,function ($q) use($request){
                return $q->where('is_active',$request->is_active);
            })
            ->orderBy('id', 'desc')
            ->paginate(config('myConfig.paginationCount'));
        }

        return view('dashboard.customer.index',compact('data'))
        ->with([
            'name'         => $request->name,
            'from_date'    => $request->from_date,
            'to_date'      => $request->to_date,
        ]);
    }



    public function show($id)
    {
        $item = Customer::with(['customerSource','city','area','customerCategory','activity'])->findOrFail($id);
        if(isset($id))
        {
            $module            = Customer::get();
            $attachmentsModule = Attachment::get();
            $cities            = City::get();
            $areas             = Area::get();
            $industries        = Industry::get();
            $majors            = Major::get();
            $activities        = Activity::get();
            $contactSources    = ContactSource::get();

            return view('dashboard.customer.show', [
                'attachmentsModule' => $attachmentsModule,
                'contactSources'    => $contactSources,
                'cities'            => $cities,
                'areas'             => $areas,
                'industries'        => $industries,
                'majors'            => $majors,
                'activities'        => $activities,
            ])->with('item', $item);
        }
        else
        {
            return view('404');
        }

    }



    public function create()
    {
        return view('dashboard.customer.create');
    }



    public function store($request)
    {
        try {
            $validated            = $request->validated();
            $inputs               = $request->except('photo');
            $inputs['created_by'] = Auth::user()->context_id;
            $data                 = Customer::create($inputs);
            //upload photo
            if ($request->hasFile('photo')) {
                $file      = $request->photo;
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $file_name = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('customer', $file_name, 'attachments');
                $data->media()->create([
                    'file_path' => asset('public/attachments/customer/' . $file_name),
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1,
                ]);
            }
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }

            session()->flash('success');
            return redirect()->route('customer.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('dashboard.customer.edit', compact('customer'));
    }



    public function update($request)
    {
        try {
            $validated = $request->validated();
            $inputs    = $request->except('photo');
            $data      = Customer::findOrFail($request->id);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            $data->update($inputs);
            // update photo
            if ($request->hasFile('photo')) {
                $file = $request->photo;
                //remove old photo
                if($data->media) {
                    Storage::disk('attachments')->delete('customer/' . $data->media->file_name);
                    $data->media->delete();
                }
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $file_name = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('customer', $file_name, 'attachments');
                $data->media()->create([
                    'file_path' => asset('public/attachments/customer/' . $file_name),
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1
                ]);
            }
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }

            session()->flash('success');
            return redirect()->route('customer.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy($request)
    {
        try {
            $data = Customer::findOrFail($request->id);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            $data->update([
                'mobile'      => $data->mobile ? $data->mobile.'x' : '',
                'national_id' => $data->national_id ? $data->national_id.'x' : '',
            ]);
            $data->delete();
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function addParent($id)
    {
        $parent_id = $id;
        return view('dashboard.customer.addParent', compact('parent_id'));
    }



    public function storeParent($request)
    {
        try {
            $validated            = $request->validated();
            $inputs               = $request->all();
            $inputs['created_by'] = Auth::user()->context_id;
            $data                 = Customer::create($inputs);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }

            session()->flash('success');
            return redirect()->route('customer.show',$inputs['parent_id']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
