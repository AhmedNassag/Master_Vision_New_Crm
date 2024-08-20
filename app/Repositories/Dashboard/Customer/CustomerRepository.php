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
        $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

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
            ->when($request->national_id != null,function ($q) use($request){
                return $q->where('national_id','like', '%'.$request->national_id.'%');
            })
            ->when($request->gender != null,function ($q) use($request){
                return $q->where('gender',$request->gender);
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
            ->when($request->service_id != null,function ($q) use($request){
                return $q->whereHas('invoices', function ($query) use ($request) {
                    $query->where('service_id', $request->service_id);
                });
            })
            ->when($request->branch_id != null,function ($q) use($request){
                return $q->where('branch_id',$request->branch_id);
            })
            ->when($request->created_by != null,function ($q) use($request){
                return $q->where('created_by',$request->created_by);
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
                return $q->where('created_at', '>=', $request->from_date);
            })
            ->when($request->to_date != null,function ($q) use($request){
                return $q->where('created_at', '<=', $request->to_date);
            })
            ->when($request->status != null,function ($q) use($request){
                return $q->where('status',$request->status);
            })
            ->when($request->is_active != null,function ($q) use($request){
                return $q->where('is_active',$request->is_active);
            })
            ->when($request->input('query') != null ,function ($q) use($request){
                return $q->where('mobile','like', '%'.$request->input('query').'%');
            })
            ->when($request->input('tag_id') != null, function ($q) use ($request) {
                return $q->whereHas('tags', function ($query) use ($request) {
                    $query->where('tag_id', $request->input('tag_id'));
                });
            })
            ->orderBy('id', 'desc')
            ->paginate($perPage)->appends(request()->query());
        }
        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
        {
            $data = Customer::
            /*whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
            ->orWhere('created_by', auth()->user()->employee->id)*/
            where(function ($query) use ($request) {
                $query->whereRelation('createdBy', 'branch_id', auth()->user()->employee->branch_id)
                    ->orWhere('created_by', auth()->user()->employee->id)
                    ->orWhere('branch_id', auth()->user()->employee->branch_id);
            })
            ->when($request->name != null,function ($q) use($request){
                return $q->where('name','like', '%'.$request->name.'%');
            })
            ->when($request->mobile != null,function ($q) use($request){
                return $q->where('mobile','like', '%'.$request->mobile.'%');
            })
            ->when($request->birth_date != null,function ($q) use($request){
                return $q->where('birth_date','like', '%'.$request->birth_date.'%');
            })
            ->when($request->national_id != null,function ($q) use($request){
                return $q->where('national_id','like', '%'.$request->national_id.'%');
            })
            ->when($request->gender != null,function ($q) use($request){
                return $q->where('gender',$request->gender);
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
            ->when($request->service_id != null,function ($q) use($request){
                return $q->whereHas('invoices', function ($query) use ($request) {
                    $query->where('service_id', $request->service_id);
                });
            })
            ->when($request->branch_id != null,function ($q) use($request){
                return $q->where('branch_id',$request->branch_id);
            })
            ->when($request->created_by != null,function ($q) use($request){
                return $q->where('created_by',$request->created_by);
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
                return $q->where('created_at', '>=', $request->from_date);
            })
            ->when($request->to_date != null,function ($q) use($request){
                return $q->where('created_at', '<=', $request->to_date);
            })
            ->when($request->status != null,function ($q) use($request){
                return $q->where('status',$request->status);
            })
            ->when($request->is_active != null,function ($q) use($request){
                return $q->where('is_active',$request->is_active);
            })
            ->when($request->input('query') != null ,function ($q) use($request){
                return $q->where('mobile','like', '%'.$request->input('query').'%');
            })
            ->when($request->input('tag_id') != null, function ($q) use ($request) {
                return $q->whereHas('tags', function ($query) use ($request) {
                    $query->where('tag_id', $request->input('tag_id'));
                });
            })
            ->orderBy('id', 'desc')
            ->paginate($perPage)->appends(request()->query());
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
            ->when($request->national_id != null,function ($q) use($request){
                return $q->where('national_id','like', '%'.$request->national_id.'%');
            })
            ->when($request->gender != null,function ($q) use($request){
                return $q->where('gender',$request->gender);
            })
            ->when($request->religion != null,function ($q) use($request){
                return $q->where('religion',$request->religion);
            })
            ->when($request->marital_status != null,function ($q) use($request){
                return $q->where('marital_status',$request->marital_status);
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
            ->when($request->service_id != null,function ($q) use($request){
                return $q->whereHas('invoices', function ($query) use ($request) {
                    $query->where('service_id', $request->service_id);
                });
            })
            ->when($request->branch_id != null,function ($q) use($request){
                return $q->where('branch_id',$request->branch_id);
            })
            ->when($request->created_by != null,function ($q) use($request){
                return $q->where('created_by',$request->created_by);
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
                return $q->where('created_at', '>=', $request->from_date);
            })
            ->when($request->to_date != null,function ($q) use($request){
                return $q->where('created_at', '<=', $request->to_date);
            })
            ->when($request->status != null,function ($q) use($request){
                return $q->where('status',$request->status);
            })
            ->when($request->is_active != null,function ($q) use($request){
                return $q->where('is_active',$request->is_active);
            })
            ->when($request->input('query') != null ,function ($q) use($request){
                return $q->where('mobile','like', '%'.$request->input('query').'%');
            })
            ->when($request->input('tag_id') != null, function ($q) use ($request) {
                return $q->whereHas('tags', function ($query) use ($request) {
                    $query->where('tag_id', $request->input('tag_id'));
                });
            })
            ->orderBy('id', 'desc')
            ->paginate($perPage)->appends(request()->query());
        }

        return view('dashboard.customer.index',compact('data'))
        ->with([
            'perPage'           => $perPage,
            'name'              => $request->name,
            'mobile'            => $request->mobile,
            'birth_date'        => $request->birth_date,
            'national_id'       => $request->national_id,
            'gender'            => $request->gender,
            'religion'          => $request->religion,
            'marital_status'    => $request->marital_status,
            'contact_source_id' => $request->contact_source_id,
            'activity_id'       => $request->activity_id,
            'interest_id'       => $request->interest_id,
            'service_id'        => $request->service_id,
            'branch_id'         => $request->branch_id,
            'created_by'        => $request->created_by,
            'employee_id'       => $request->employee_id,
            'city_id'           => $request->city_id,
            'area_id'           => $request->area_id,
            'industry_id'       => $request->industry_id,
            'major_id'          => $request->major_id,
            'is_active'         => $request->is_active,
            'status'            => $request->status,
            'tag_id'            => $request->tag_id,
            'from_date'         => $request->from_date,
            'to_date'           => $request->to_date,
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
            $validated                   = $request->validated();
            $inputs                      = $request->except('photo','tag_ids','mobile_whatsapp_checkbox','mobile2_whatsapp_checkbox');
            $inputs['has_special_needs'] = $request->has_special_needs ? 1 : 0;
            $inputs['created_by']        = Auth::user()->employee->id;
            $data                        = Customer::create($inputs);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            //create code
            $data->update(['code' => $this->createCode($data)]);
            //upload photo
            if ($request->hasFile('photo')) {
                $file      = $request->photo;
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $file_name = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('customer', $file_name, 'attachments');
                $data->media()->create([
                    'file_path' => asset('attachments/customer/' . $file_name),
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1,
                ]);
            }

            // Attach tags to the customer
            $tagIds = $request->input('tag_ids', []);
            $data->tags()->sync($tagIds);

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
            $validated                   = $request->validated();
            $inputs                      = $request->except('photo','tag_ids','mobile_whatsapp_checkbox','mobile2_whatsapp_checkbox');
            $inputs['has_special_needs'] = $request->has_special_needs ? 1 : 0;
            $data                        = Customer::findOrFail($request->id);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            $old_branch_id = $data->branch_id;
            $data->update($inputs);
            //create code if code is null or if branch is change
            if($data->code == null || $old_branch_id != $data->branch_id) {
                $data->update(['code' => $this->createCode($data)]);
            }
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
                    'file_path' => asset('attachments/customer/' . $file_name),
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1
                ]);
            }

            // Attach tags to the customer
            $tagIds = $request->input('tag_ids', []);
            $data->tags()->sync($tagIds);

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
            $data->delete();
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function deleteSelected($request)
    {
        try {
            $delete_selected_id = explode(",", $request->delete_selected_id);
            // foreach($delete_selected_id as $selected_id) {
            //     $related_table = realed_model::where('contact_id', $selected_id)->pluck('contact_id');
            //     if($related_table->count() == 0) {
                    $customers = Customer::whereIn('id', $delete_selected_id)->get();
                    foreach($customers as $customer)
                    {
                        $customer->delete();
                    }
                    session()->flash('success');
                    return redirect()->back();
            //     } else {
            //         session()->flash('canNotDeleted');
            //         return redirect()->back();
            //     }
            // }
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
            //create code
            $data->update(['code' => $this->createCode($data)]);
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



    public function createCode($customer)
    {
        // Retrieve the branch code from the branch
        $branchCode = $customer->branch && $customer->branch->code != null  ? $customer->branch->code  : '00';

        // Get the current year
        $currentYear = date('y');

        // Generate a serial number
        $latestCustomer = Customer::where('code', 'Like', "{$branchCode}/{$currentYear}/%")
            ->orderBy('id', 'desc')
            ->first();

        $serialNumber = 000001; // Default serial number
        if ($latestCustomer) {
            // Extract the last serial number and increment it
            $lastCode = $latestCustomer->code;
            $lastSerialNumber = (int)substr($lastCode, strrpos($lastCode, '/') + 1);
            $serialNumber = $lastSerialNumber + 1;
        }

        // Format the serial number to be at least 3 digits
        $formattedSerialNumber = str_pad($serialNumber, 6, '0', STR_PAD_LEFT);

        // Construct the new code
        $newCode = "{$branchCode}/{$currentYear}/{$formattedSerialNumber}";

        return $newCode;
    }

}
