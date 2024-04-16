<?php

namespace App\Repositories\Dashboard\Contact;


use Carbon\Carbon;
use App\Traits\ImageTrait;
use App\Observers\ContactDataObserver;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Services\ContactFilterService;
use App\Services\LeadConversionService;
use App\Services\LeadHistoryService;
use App\Models\Contact;
use App\Models\ContactCompletion;
use App\Models\JobTitle;
use App\Models\Contact_Category;
use App\Models\ContactSource;
use App\Models\City;
use App\Models\Area;
use App\Models\Industry;
use App\Models\Major;
use App\Models\Activate;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Meeting;
use App\Models\MeetingNote;



class ContactRepository implements ContactInterface
{
    use ImageTrait;

    public function index($request)
    {
        if(Auth::user()->roles_name[0] == "Admin")
        {
            $data = Contact::where('is_trashed','!=' ,1)->with(['media','contactSource','city','area','contactCategory','activity','subActivity','employee'])
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
        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
        {
            $data = Contact::where('is_trashed','!=' ,1)->with(['media','contactSource','city','area','contactCategory','activity','subActivity','employee'])
            ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
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
            $data = Contact::where('is_trashed','!=' ,1)->with(['media','contactSource','city','area','contactCategory','activity','subActivity','employee'])
            ->where('employee_id', auth()->user()->employee->id)
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

        return view('dashboard.contact.index',compact('data'))
        ->with([
            'name'         => $request->name,
            'from_date'    => $request->from_date,
            'to_date'      => $request->to_date,
        ]);
    }



    public function show($id)
    {
        $item = Contact::with(['media','contactSource','city','area','contactCategory','activity','subActivity','employee'])->findOrFail($id);
        if (isset($item->id)) {
            $module             = Contact::get();
            $meetingModule      = Meeting::get();
            $notesModule        = MeetingNote::get();
            $branches           = Branch::get();
            $leadHistoryService = new LeadHistoryService();
            $contactHistories   = $leadHistoryService->organizeLeadHistoryForTimeline($item);
            $employees          = Employee::all();
            $completionByDate   = ContactCompletion::where('contact_id',$item->id)->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d %H:%i') as date_creation"), DB::raw('count(*) as completion_percentage'))->groupBy('date_creation')->get();
            $completedData      = ContactCompletion::where('contact_id',$item->id)->select('completed_by',DB::raw('count(*) as completion_percentage'),DB::raw('GROUP_CONCAT(property_name) as fields'))->groupBy('completed_by')->get();
            $contactObserver    = new ContactDataObserver();
            $totalFields        = count($contactObserver->trackedFields);
            foreach($completionByDate as $date)
            {
                $date->completion_percentage =  round(($date->completion_percentage / $totalFields) * 100);
            }
            return view('dashboard.contact.show', [
                'completionByDate' => $completionByDate,
                'completedData'    => $completedData,
                'employees'        => $employees,
                'no_header'        => true,
                'meetingModule'    => $meetingModule,
                'notesModule'      => $notesModule,
                'histories'        => $contactHistories,
                "branches"         => $branches,
            ])->with('item', $item);
        }
        else
        {
            return view('404');
        }
    }



    public function create()
    {
        return view('dashboard.contact.create');
    }



    public function store($request)
    {
        try {
            $validated            = $request->validated();
            $inputs               = $request->except('photo');
            $inputs['created_by'] = Auth::user()->id;
            if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 0)
            {
                $inputs['employee_id'] = Auth::user()->id;
            }
            $data = Contact::create($inputs);
            //upload photo
            if ($request->hasFile('photo')) {
                $file      = $request->photo;
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $file_name = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('contact', $file_name, 'attachments');
                $data->media()->create([
                    'file_path' => asset('attachments/contact/' . $file_name),
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
            //create in completion
            $this->completionData($inputs, $data->id);

            session()->flash('success');
            return redirect()->route('contact.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('dashboard.contact.edit', compact('contact'));
    }



    public function update($request)
    {
        try {
            $validated = $request->validated();
            $inputs    = $request->except('photo');
            $data      = Contact::findOrFail($request->id);
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
                    Storage::disk('attachments')->delete('contact/' . $data->media->file_name);
                    $data->media->delete();
                }
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $file_name = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('contact', $file_name, 'attachments');
                $data->media()->create([
                    'file_path' => asset('attachments/contact/' . $file_name),
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
            //create in completion
            $this->completionData($inputs, $request->id);

            session()->flash('success');
            return redirect()->route('contact.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy($request)
    {
        try {
            $data = Contact::findOrFail($request->id);
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



    public function deleteSelected($request)
    {
        try {
            $delete_selected_id = explode(",", $request->delete_selected_id);
            // foreach($delete_selected_id as $selected_id) {
            //     $related_table = realed_model::where('contact_id', $selected_id)->pluck('contact_id');
            //     if($related_table->count() == 0) {
                    $contacts = Contact::whereIn('id', $delete_selected_id)->get();
                    foreach($contacts as $contact)
                    {
                        $contact->update([
                            'mobile'      => $contact->mobile? $contact->mobile.'x' : '',
                            'national_id' => $contact->national_id ? $contact->national_id.'x' : '',
                        ]);
                        $contact->delete();
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



    public function trashSelected($request)
    {
        try {
            $trash_selected_id = explode(",", $request->trash_selected_id);
            // foreach($delete_selected_id as $selected_id) {
            //     $related_table = realed_model::where('contact_id', $selected_id)->pluck('contact_id');
            //     if($related_table->count() == 0) {
                    $contacts = Contact::whereIn('id', $trash_selected_id)->get();
                    foreach($contacts as $contact)
                    {
                        $contact->update(['is_trashed' => !$contact->is_trashed]);
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



    public function activateSelected($request)
    {
        try {
            $activate_selected_id = explode(",", $request->activate_selected_id);
            // foreach($delete_selected_id as $selected_id) {
            //     $related_table = realed_model::where('contact_id', $selected_id)->pluck('contact_id');
            //     if($related_table->count() == 0) {
                    $contacts = Contact::whereIn('id', $activate_selected_id)->get();
                    foreach($contacts as $contact)
                    {
                        $contact->update(['is_active' => !$contact->is_active]);
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



    public function relateSelected($request)
    {
        try {
            $relate_selected_id = explode(",", $request->relate_selected_id);
            // foreach($delete_selected_id as $selected_id) {
            //     $related_table = realed_model::where('contact_id', $selected_id)->pluck('contact_id');
            //     if($related_table->count() == 0) {
                    $contacts = Contact::whereIn('id', $relate_selected_id)->get();
                    foreach($contacts as $contact)
                    {
                        $contact->update(['employee_id' => $request->employee_id]);
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



    public function changeActive($request)
    {
        try {
            $data = Contact::findOrFail($request->id);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            $data->update(['is_active' => !$data->is_active]);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function changeTrash($request)
    {
        try {
            $data = Contact::findOrFail($request->id);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            $data->update(['is_trashed' => !$data->is_trashed]);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function relateEmployee($request)
    {
        try {
            $data = Contact::findOrFail($request->id);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            $data->update(['employee_id' => $request->employee_id]);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function trashed($request)
    {
        if(Auth::user()->roles_name[0] == "Admin")
        {
            $data = Contact::where('is_trashed', 1)->with(['media','contactSource','city','area','contactCategory','activity','subActivity','employee'])
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
        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
        {
            $data = Contact::where('is_trashed', 1)->with(['media','contactSource','city','area','contactCategory','activity','subActivity','employee'])
            ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
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
            $data = Contact::where('is_trashed', 1)->with(['media','contactSource','city','area','contactCategory','activity','subActivity','employee'])
            ->where('employee_id', auth()->user()->employee->id)
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

        return view('dashboard.contact.index',compact('data'))
        ->with([
            'name'         => $request->name,
            'from_date'    => $request->from_date,
            'to_date'      => $request->to_date,
        ]);
    }



    function completionData($inputs, $id)
    {
        //delete old records
        $oldContactCompletions = ContactCompletion::where('contact_id',$id)->get();
        if($oldContactCompletions->count() > 0)
        {
            foreach($oldContactCompletions as $oldContactCompletion)
            {
                $oldContactCompletion->delete();
            }
        }
        foreach($inputs as $key=>$input)
        {
            //insert new records
            if($key != "_token" && $key != "_method" && $key != "id" && $key != "created_by" && $input != null)
            {
                $contactCompletion = ContactCompletion::create([
                    'contact_id'    => $id,
                    'completed_by'  => Auth::user()->id,
                    'property_name' => $key,
                ]);
            }
        }
    }

}
