<?php

namespace App\Http\Controllers\Api\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\JobTitle;
use App\Models\ContactCategory;
use App\Models\ContactSource;
use App\Models\City;
use App\Models\Area;
use App\Models\Industry;
use App\Models\Major;
use App\Models\Activity;
use App\Models\Employee;
use App\Exports\ContactExport;
use App\Imports\ContactImport;
use App\Repositories\Dashboard\Contact\ContactInterface;
use App\Http\Requests\Dashboard\Contact\StoreRequest;
use App\Http\Requests\Dashboard\Contact\UpdateRequest;
use App\Services\ApiLeadConversionService;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\ContactFilterService;
use Carbon\Carbon;
use App\Traits\ImageTrait;
use App\Observers\ContactDataObserver;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Services\LeadHistoryService;
use App\Models\ContactCompletion;
use App\Models\Contact_Category;
use App\Models\Activate;
use App\Models\Branch;
use App\Models\Meeting;
use App\Models\MeetingNote;
use App\Models\SubActivity;
use App\Models\User;
use App\Traits\ApiResponseTrait;

class ContactController extends Controller
{
    use ApiResponseTrait;
    use ImageTrait;

    public function __construct()
    {
        $this->middleware('permission:عرض جهات الإتصال', ['only' => ['index','show']]);
        $this->middleware('permission:إضافة جهات الإتصال', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل جهات الإتصال', ['only' => ['edit','update','relateSelected','relateEmployee']]);
        $this->middleware('permission:حذف جهات الإتصال', ['only' => ['destroy','deleteSelected']]);
        $this->middleware('permission:أرشفة جهات الإتصال', ['only' => ['trashed','trashSelected','changeTrash']]);
        $this->middleware('permission:تصدير جهات الإتصال', ['only' => ['exportView','exportData']]);
        $this->middleware('permission:إستيراد جهات الإتصال', ['only' => ['importData']]);
        $this->middleware('permission:تغيير حالات تنشيط جهات الإتصال', ['only' => ['activateSelected','changeActive','changeStatus']]);
        // $this->middleware('permission:إضافة مكالمات جهات الإتصال', ['only' => ['index']]);
        // $this->middleware('permission:إرسال رسائل جهات الإتصال', ['only' => ['index']]);
    }



    public function index(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id'           => 'required|exists:users,id',
                'name'              => 'nullable',
                'mobile'            => 'nullable',
                'birth_date'        => 'nullable',
                'gender'            => 'nullable',
                'contact_source_id' => 'nullable|exists:contact_sources,id',
                'activity_id'       => 'nullable|exists:activates,id',
                'interest_id'       => 'nullable|exists:interests,id',
                'city_id'           => 'nullable|exists:cities,id',
                'area_id'           => 'nullable|exists:areas,id',
                'industry_id'       => 'nullable|exists:industries,id',
                'major_id'          => 'nullable|exists:majors,id',
                'status'            => 'nullable',
                'is_active'         => 'nullable',
                'from_date'         => 'nullable',
                'to_date'           => 'nullable',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            if($auth_user->roles_name[0] == "Admin")
            {
                $data = Contact::where('is_trashed','!=' ,1)
                ->with(['city','area','contactSource','contactCategory','jobTitle','industry','major','activity','subActivity','campaign','customer','employee','createdBy','contactCompletions','meetings','leadCategories','leadHistories','categories','media'])
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
            else if($auth_user->roles_name[0] != "Admin" && $auth_user->employee->has_branch_access == 1)
            {
                $data = Contact::where('is_trashed','!=' ,1)
                ->with(['city','area','contactSource','contactCategory','jobTitle','industry','major','activity','subActivity','campaign','customer','employee','createdBy','contactCompletions','meetings','leadCategories','leadHistories','categories','media'])
                ->whereRelation('createdBy','branch_id', $auth_user->employee->branch_id)
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
                $data = Contact::where('is_trashed','!=' ,1)
                ->with(['city','area','contactSource','contactCategory','jobTitle','industry','major','activity','subActivity','campaign','customer','employee','createdBy','contactCompletions','meetings','leadCategories','leadHistories','categories','media'])
                ->where('employee_id', $auth_user->employee->id)
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

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function show($id)
    {
        try {

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

                $histories          = [];
                $historiesDetails[] = [];
                foreach ($contactHistories as $date => $history)
                {
                    $histories['date'] = $date;
    //                $historiesDetails[] = [];
                    foreach ($history as $timelineItem)
                    {
                        if ($timelineItem->action == \App\Constants\LeadHistory\Actions::CALL_CREATED)
                        {
                            $historiesDetails['created_at'] = $timelineItem->created_at->format('H:i');
                            $historiesDetails['created_by'] = $timelineItem->createdBy->name;

                            $meeting = \App\Models\Meeting::find($timelineItem->related_model_id);
                            $historiesDetails['meeting_type']  = $meeting->type;
                            $historiesDetails['meeting_place'] = $meeting->meeting_place;
                            $historiesDetails['meeting_date']  = $meeting->meeting_date;
                            $historiesDetails['meeting_reply'] = $meeting->reply->reply;
                            $historiesDetails['notes']         = strip_tags($timelineItem->placeholders_array['notes']);
                            $historiesDetails['follow_date']   = $timelineItem->placeholders_array['follow_date'];
                        }
                        if($timelineItem->action == \App\Constants\LeadHistory\Actions::STATUES_CHANGED)
                        {
                            $historiesDetails['created_at'] = $timelineItem->created_at->format('H:i');

                            $logContact = \App\Models\Contact::find($timelineItem->related_model_id);
                            $historiesDetails['created_by'] = $timelineItem->createdBy->name;
                            $historiesDetails['from']       = $timelineItem->placeholders_array['from'];
                            $historiesDetails['to']         = $timelineItem->placeholders_array['to'];
                        }
                        $histories['historiesDetails'][] = $historiesDetails;
                    }

                }
                /*
                $completedHistory = [];
                foreach ($completedData as $data)
                {
                    $completedHistory['completedBy'][] = $data->completedBy ? $data->completedBy->name : "----";
                    $completedHistory['field'] = [];
                    foreach (explode(',', $data->fields) as $field)
                    {
                        $completedHistory['field'][] = $field;
                        return response()->json($completedHistory['field']);
                    }
                    $completedHistory['completion_percentage'][] = $data->completion_percentage;
                }
                */

                $data[] = [
                    'data'             => $item,
                    'completionByDate' => $completionByDate,
                    'completedData'    => $completedData,
                    'employees'        => $employees,
                    // 'no_header'        => true,
                    // 'notesModule'      => $notesModule,
                    // 'histories'        => $contactHistories,
                    // "branches"         => $branches,
                    'contactHistory'   => $histories ? [$histories] : $histories,
                    // 'completedHistory' => $completedHistory,
                ];
                // return response()->json($data);

                return $this->apiResponse($data, 'The Data Returned Successfully', 200);
            }
            else
            {
                return $this->apiResponse(null, 'The Data Not Found', 404);
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function create()
    {
        try {

            $contact_source_id = ContactSource::get(['id','name']);
            $activity_id       = Activity::get(['id','name']);
            $interest_id       = SubActivity::get(['id','name']);
            $job_title_id      = JobTitle::get(['id','name']);
            $city_id           = City::get(['id','name']);
            $area_id           = Area::get(['id','name']);
            $industry_id       = Industry::get(['id','name']);
            $major_id          = Major::get(['id','name']);
            $data[] = [
                'contact_source_id' => $contact_source_id,
                'activity_id'       => $activity_id,
                'interest_id'       => $interest_id,
                'job_title_id'      => $job_title_id,
                'city_id'           => $city_id,
                'area_id'           => $area_id,
                'industry_id'       => $industry_id,
                'major_id'          => $major_id,
            ];

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id'             => 'required|exists:users,id',
                'name'                => 'required|string',
                'mobile'              => 'required|numeric|unique:contacts,mobile',
                'national_id'         => 'nullable|numeric|unique:contacts,national_id',
                'contact_source_id'   => 'required|integer|exists:contact_sources,id',
                'activity_id'         => 'required|integer|exists:activates,id',
                'interest_id'         => 'required|integer|exists:interests,id',
                'employee_id'         => 'nullable|integer|exists:employees,id',
                'job_title_id'        => 'nullable|integer|exists:job_titles,id',
                'city_id'             => 'nullable|integer|exists:cities,id',
                'area_id'             => 'nullable|integer|exists:areas,id',
                'contact_category_id' => 'nullable|integer|exists:contact_categories,id',
                'major_id'            => 'nullable|integer|exists:majors,id',
                'mobile2'             => 'nullable|numeric|unique:contacts,mobile2',
                'email'               => 'nullable|email|unique:contacts,email',
                'birth_date'          => 'nullable|date',
                'company_name'        => 'nullable',
                'gender'              => 'nullable|in:Male,Female',
                'notes'               => 'nullable',
                'photo'               => 'nullable'. ($request->hasFile('photo') ? '|mimes:jpeg,jpg,png,webp|max:5048' : ''),
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user            = User::findOrFail(auth()->guard('api')->user()->id);
            $inputs               = $request->except('photo');
            $inputs['created_by'] = auth()->guard('api')->user()->id;
            if($auth_user->roles_name[0] != "Admin" && $auth_user->employee->has_branch_access == 0)
            {
                $inputs['employee_id'] = auth()->guard('api')->user()->id;
            }

            $data = Contact::create([
                'name'                => $inputs['name'],
                'mobile'              => $inputs['mobile'],
                'contact_source_id'   => $inputs['contact_source_id'],
                'activity_id'         => $inputs['activity_id'],
                'interest_id'         => $inputs['interest_id'],
                'created_by'          => $inputs['created_by'],
                'employee_id'         => $inputs['employee_id'] ?? null,
                'notes'               => $inputs['notes'] ?? null,
                'mobile2'             => $inputs['mobile2'] ?? null,
                'email'               => $inputs['email'] ?? null,
                'national_id'         => $inputs['national_id'] ?? null,
                'birth_date'          => $inputs['birth_date'] ?? null,
                'company_name'        => $inputs['company_name'] ?? null,
                'gender'              => $inputs['gender'] ?? null,
                'job_title_id'        => $inputs['job_title_id'] ?? null,
                'city_id'             => $inputs['city_id'] ?? null,
                'area_id'             => $inputs['area_id'] ?? null,
                'contact_category_id' => $inputs['contact_category_id '] ?? null,
                'major_id'            => $inputs['major_id '] ?? null,
            ]);

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
                return $this->apiResponse(null, 'An Error Occur', 401);
            }

            //create in completion
            $this->completionData($inputs, $data->id, $auth_user);

            return $this->apiResponse($data, 'The Data Stored Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
    {
        try {

            $item              = Contact::findOrFail($id);
            $contact_source_id = ContactSource::get(['id','name']);
            $activity_id       = Activity::get(['id','name']);
            $interest_id       = SubActivity::get(['id','name']);
            $job_title_id      = JobTitle::get(['id','name']);
            $city_id           = City::get(['id','name']);
            $area_id           = Area::get(['id','name']);
            $industry_id       = Industry::get(['id','name']);
            $major_id          = Major::get(['id','name']);
            $data[] = [
                'item'              => $item,
                'contact_source_id' => $contact_source_id,
                'activity_id'       => $activity_id,
                'interest_id'       => $interest_id,
                'job_title_id'      => $job_title_id,
                'city_id'           => $city_id,
                'area_id'           => $area_id,
                'industry_id'       => $industry_id,
                'major_id'          => $major_id,
            ];

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function update(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id'             => 'required|exists:users,id',
                'name'                => 'required|string',
                'mobile'              => 'required|numeric|unique:contacts,mobile,'.$request->id,
                'national_id'         => 'nullable|numeric|unique:contacts,national_id,'.$request->id,
                'contact_source_id'   => 'required|integer|exists:contact_sources,id',
                'activity_id'         => 'required|integer|exists:activates,id',
                'interest_id'         => 'required|integer|exists:interests,id',
                'employee_id'         => 'nullable|integer|exists:employees,id',
                'job_title_id'        => 'nullable|integer|exists:job_titles,id',
                'city_id'             => 'nullable|integer|exists:cities,id',
                'area_id'             => 'nullable|integer|exists:areas,id',
                'contact_category_id' => 'nullable|integer|exists:contact_categories,id',
                'major_id'            => 'nullable|integer|exists:majors,id',
                'mobile2'             => 'nullable|numeric|unique:contacts,mobile2,'.$request->id,
                'email'               => 'nullable|email|unique:contacts,email,'.$request->id,
                'birth_date'          => 'nullable|date',
                'company_name'        => 'nullable',
                'gender'              => 'nullable|in:Male,Female',
                'notes'               => 'nullable',
                'photo'               => 'nullable'. ($request->hasFile('photo') ? '|mimes:jpeg,jpg,png,webp|max:5048' : ''),
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user            = User::findOrFail(auth()->guard('api')->user()->id);
            $data                 = Contact::findOrFail($request->id);
            $inputs               = $request->except('photo');
            $inputs['created_by'] = auth()->guard('api')->user()->id;
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }

            $data->update([
                'name'                => $inputs['name'],
                'mobile'              => $inputs['mobile'],
                'contact_source_id'   => $inputs['contact_source_id'],
                'activity_id'         => $inputs['activity_id'],
                'interest_id'         => $inputs['interest_id'],
                'created_by'          => $inputs['created_by'],
                'employee_id'         => $inputs['employee_id'] ?? $data->employee_id,
                'notes'               => $inputs['notes'] ?? $data->notes,
                'mobile2'             => $inputs['mobile2'] ?? $data->mobile2,
                'email'               => $inputs['email'] ?? $data->email,
                'national_id'         => $inputs['national_id'] ?? $data->national_id,
                'birth_date'          => $inputs['birth_date'] ?? $data->birth_date,
                'company_name'        => $inputs['company_name'] ?? $data->company_name,
                'gender'              => $inputs['gender'] ?? $data->gender,
                'job_title_id'        => $inputs['job_title_id'] ?? $data->job_title_id,
                'city_id'             => $inputs['city_id'] ?? $data->city_id,
                'area_id'             => $inputs['area_id'] ?? $data->area_id,
                'contact_category_id' => $inputs['contact_category_id '] ?? $data->contact_category_id,
                'major_id'            => $inputs['major_id '] ?? $data->major_id,
            ]);

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
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            //create in completion
            $this->completionData($inputs, $data->id, $auth_user);

            return $this->apiResponse($data, 'The Data Updated Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy(Request $request)
    {
        try {

            $data = Contact::findOrFail($request->id);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            $data->update([
                'mobile'      => $data->mobile ? $data->mobile.'x' : '',
                'national_id' => $data->national_id ? $data->national_id.'x' : '',
            ]);
            $data->delete();
            return $this->apiResponse(null, 'The Data Deleted Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function changeActive($id)
    {
        try {

            $data = Contact::findOrFail($id);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            $data->update(['is_active' => !$data->is_active]);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Updated Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function changeTrash($id)
    {
        try {

            $data = Contact::findOrFail($id);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            $data->update(['is_trashed' => !$data->is_trashed]);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Updated Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function changeRelateEmployee(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'employee_id' => 'required|integer|exists:employees,id',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }
            $data = Contact::findOrFail($id);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            $data->update(['employee_id' => $request->employee_id]);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Updated Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function trashed(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id'           => 'required|exists:users,id',
                'name'              => 'nullable',
                'mobile'            => 'nullable',
                'birth_date'        => 'nullable',
                'gender'            => 'nullable',
                'contact_source_id' => 'nullable|exists:contact_sources,id',
                'activity_id'       => 'nullable|exists:activates,id',
                'interest_id'       => 'nullable|exists:interests,id',
                'city_id'           => 'nullable|exists:cities,id',
                'area_id'           => 'nullable|exists:areas,id',
                'industry_id'       => 'nullable|exists:industries,id',
                'major_id'          => 'nullable|exists:majors,id',
                'status'            => 'nullable',
                'is_active'         => 'nullable',
                'from_date'         => 'nullable',
                'to_date'           => 'nullable',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            if($auth_user->roles_name[0] == "Admin")
            {
                $main_data = Contact::where('is_trashed',1)->with(['contactSource','city','area','contactCategory','activity','subActivity','employee'])
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
                ->paginate(config('myConfig.paginationCount'));
            }
            else if($auth_user->roles_name[0] != "Admin" && $auth_user->employee->has_branch_access == 1)
            {
                $main_data = Contact::where('is_trashed',1)->with(['contactSource','city','area','contactCategory','activity','subActivity','employee'])
                ->whereRelation('createdBy','branch_id', $auth_user->employee->branch_id)
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
                ->paginate(config('myConfig.paginationCount'));
            }
            else
            {
                $main_data = Contact::where('is_trashed',1)->with(['contactSource','city','area','contactCategory','activity','subActivity','employee'])
                ->where('employee_id', $auth_user->employee->id)
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
                ->paginate(config('myConfig.paginationCount'));
            }

            $contact_source_id = ContactSource::get(['id','name']);
            $activity_id       = Activity::get(['id','name']);
            $interest_id       = SubActivity::get(['id','name']);
            $city_id           = City::get(['id','name']);
            $area_id           = Area::get(['id','name']);
            $industry_id       = Industry::get(['id','name']);
            $major_id          = Major::get(['id','name']);
            $data[] = [
                'data'              => $main_data,
                'contact_source_id' => $contact_source_id,
                'activity_id'       => $activity_id,
                'interest_id'       => $interest_id,
                'city_id'           => $city_id,
                'area_id'           => $area_id,
                'industry_id'       => $industry_id,
                'major_id'          => $major_id,
            ];

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    function completionData($inputs, $id, $auth_user)
    {
        try {

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
                        'completed_by'  => $auth_user->id,
                        'property_name' => $key,
                    ]);
                }
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function changeStatus(Request $request, ApiLeadConversionService $leadConversionService)
	{
        try {
            
            $validator = Validator::make($request->all(), [
                // 'auth_id'                => 'required|exists:users,id',
                'contact_id'             => 'required|exists:contacts,id',
                'status'                 => 'required|in:new,contacted,qualified,converted',
                'invoice'                => ['required_if:status,converted','array','min:1'],
                'invoice.*.invoice_number' => 'required_if:status,converted',
                'invoice.*.invoice_date'   => 'required_if:status,converted',
                'invoice.*.total_amount'   => 'required_if:status,converted',
                'invoice.*.amount_paid'    => 'required_if:status,converted',
                'invoice.*.debt'           => 'required_if:status,converted',
                'invoice.*.description'    => 'required_if:status,converted',
                'invoice.*.status'         => 'required_if:status,converted',
            ]);

            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            $lead      = Contact::findOrFail($request->contact_id);
            // Check if the status transition is allowed
            if (!$this->isStatusTransitionAllowed($lead, $request->input('status')))
            {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }


            // Perform the status transition
            switch ($request->input('status'))
            {
                case 'contacted':
                    $leadConversionService->transitionToContacted($lead);
                    break;
                case 'qualified':
                    $leadConversionService->transitionToQualified($lead);
                    break;
                case 'converted':
                    $invoice = $request->invoice;
                    $leadConversionService->convertToCustomer($lead, $invoice,$request->input('next_reorder_reminder'));
                    break;
            }

            return $this->apiResponse($lead, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}



    private function isStatusTransitionAllowed(Contact $lead, $newStatus)
	{
        try {

            $currentStatus = $lead->status;
            // Define allowed transitions based on your conditions
            $allowedTransitions = [
                'new'       => ['contacted', 'qualified', 'converted'],
                'contacted' => ['qualified', 'converted'],
                'qualified' => ['converted'],
                'converted' => ['converted'],
            ];

            return in_array($newStatus, $allowedTransitions[$currentStatus]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

}
