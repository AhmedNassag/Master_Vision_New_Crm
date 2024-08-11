<?php

namespace App\Http\Controllers\Api\Admin;

use Validator;
use App\Models\ReorderReminder;
use App\Models\Activity;
use App\Models\SubActivity;
use App\Models\Campaign;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\ContactCategory;
use App\Models\JobTitle;
use App\Models\Invoice;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Customer\CustomerInterface;
use App\Http\Requests\Dashboard\Customer\StoreRequest;
use App\Http\Requests\Dashboard\Customer\UpdateRequest;
use App\Services\PointAdditionService;
use App\Imports\CustomersImport;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageTrait;
use App\Models\User;
use Carbon\Carbon;
use App\Models\ContactCompletion;
use App\Observers\ContactDataObserver;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Area;
use App\Models\City;
use App\Models\ContactSource;
use App\Models\Industry;
use App\Models\Interest;
use App\Models\Attachment;
use App\Models\Major;
use App\Traits\ApiResponseTrait;

class CustomerController extends Controller
{
    use ApiResponseTrait;
    use ImageTrait;

    public function __construct()
    {
        $this->middleware('permission:عرض العملاء', ['only' => ['index','show','addAttachment','deleteAttachment']]);
        $this->middleware('permission:إضافة العملاء', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل العملاء', ['only' => ['edit','update','makePassword']]);
        $this->middleware('permission:حذف العملاء', ['only' => ['destroy']]);
        $this->middleware('permission:إضافة عملاء مرتبط العملاء', ['only' => ['addParent','storeParent']]);
        $this->middleware('permission:إستيراد العملاء', ['only' => ['importData']]);
        $this->middleware('permission:إضافة فواتير العملاء', ['only' => ['addInvoice']]);
        $this->middleware('permission:تعديل فواتير العملاء', ['only' => ['editInvoice','updateInvoice']]);
        $this->middleware('permission:إضافة تذكيرات العملاء', ['only' => ['addReminder']]);
        $this->middleware('permission:إضافة إعادة إستهداف العملاء', ['only' => ['postRetargetResults']]);
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
                $data = Customer::
                with(['media','jobTitle','customerCategory','customerSource','activity','branch','city','area','industry','major','related_customers','points','createdBy','invoices','invoices.activity','invoices.interest','reminders','reminders.customer','reminders.activity','reminders.interest','reminders.invoice','contacts','contacts.city','contacts.area','contacts.contactSource','contacts.activity','contacts.subActivity','contacts.employee'])
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
                $data = Customer::
                with(['media','jobTitle','customerCategory','customerSource','activity','branch','city','area','industry','major','related_customers','points','createdBy','invoices','invoices.activity','invoices.interest','reminders','reminders.customer','reminders.activity','reminders.interest','reminders.invoice','contacts','contacts.city','contacts.area','contacts.contactSource','contacts.activity','contacts.subActivity','contacts.employee'])
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
                $data = Customer::
                with(['media','jobTitle','customerCategory','customerSource','activity','branch','city','area','industry','major','related_customers','points','createdBy','invoices','invoices.activity','invoices.interest','reminders','reminders.customer','reminders.activity','reminders.interest','reminders.invoice','contacts','contacts.city','contacts.area','contacts.contactSource','contacts.activity','contacts.subActivity','contacts.employee'])
                ->where('created_by', $auth_user->employee->id)
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
            foreach($data as $main)
            {
                $main['amount_paid'] = number_format($main->invoices->sum('amount_paid'), 0);
                $main['amount_dept'] = number_format($main->invoices->sum('total_amount') - $main->invoices->sum('amount_paid'), 0);

                $main['sumOfPoints'] = number_format($main->calculateSumOfPoints(), 0);
                $main['valueOfPoints'] = number_format($main->calculatePointsValue(), 0);
            }

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function show($id)
    {
        try {

            $data = Customer::
            with(['media','jobTitle','customerCategory','customerSource','activity','branch','city','area','industry','major','related_customers','points','createdBy','invoices','invoices.activity','invoices.interest','reminders','reminders.customer','reminders.activity','reminders.interest','reminders.invoice','contacts','contacts.city','contacts.area','contacts.contactSource','contacts.activity','contacts.subActivity','contacts.employee'])
            ->findOrFail($id);
            if($data)
            {
                $data['amount_paid'] = number_format($data->invoices->sum('amount_paid'), 0);
                $data['amount_dept'] = number_format($data->invoices->sum('total_amount') - $data->invoices->sum('amount_paid'), 0);

                $data['sumOfPoints'] = number_format($data->calculateSumOfPoints(), 0);
                $data['valueOfPoints'] = number_format($data->calculatePointsValue(), 0);

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

            $contact_source_id   = ContactSource::get(['id','name']);
            $activity_id         = Activity::get(['id','name']);
            $contact_category_id = ContactCategory::get(['id','name']);
            $city_id             = City::get(['id','name']);
            $area_id             = Area::get(['id','name']);
            $industry_id         = Industry::get(['id','name']);
            $major_id            = Major::get(['id','name']);
            $job_title_id        = JobTitle::get(['id','name']);
            $data[] = [
                'contact_source_id'   => $contact_source_id,
                'activity_id'         => $activity_id,
                'contact_category_id' => $contact_category_id,
                'city_id'             => $city_id,
                'area_id'             => $area_id,
                'industry_id'         => $industry_id,
                'major_id'            => $major_id,
                'job_title_id'        => $job_title_id,
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
                'mobile'              => 'required|numeric|unique:customers,mobile,NULL,id,deleted_at,NULL',
                'national_id'         => 'nullable|numeric|unique:customers,national_id,NULL,id,deleted_at,NULL',
                'contact_source_id'   => 'required|integer|exists:contact_sources,id',
                'activity_id'         => 'required|integer|exists:activates,id',
                'job_title_id'        => 'nullable|integer|exists:job_titles,id',
                'city_id'             => 'nullable|integer|exists:cities,id',
                'area_id'             => 'nullable|integer|exists:areas,id',
                'contact_category_id' => 'nullable|integer|exists:contact_categories,id',
                'major_id'            => 'nullable|integer|exists:majors,id',
                'mobile2'             => 'nullable|numeric|unique:customers,mobile2,NULL,id,deleted_at,NULL',
                'email'               => 'nullable|email|unique:customers,email,NULL,id,deleted_at,NULL',
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
            $inputs['created_by'] = $auth_user->context_id;
            $data                 = Customer::create([
                'name'                => $inputs['name'],
                'mobile'              => $inputs['mobile'],
                'contact_source_id'   => $inputs['contact_source_id'],
                'activity_id'         => $inputs['activity_id'],
                'created_by'          => $inputs['created_by'],
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
                'industry_id'         => $inputs['industry_id '] ?? null,
            ]);
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
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }

            return $this->apiResponse($data, 'The Data Stored Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
    {
        try {

            $item                = Customer::findOrFail($id);
            $contact_source_id   = ContactSource::get(['id','name']);
            $activity_id         = Activity::get(['id','name']);
            $contact_category_id = ContactCategory::get(['id','name']);
            $city_id             = City::get(['id','name']);
            $area_id             = Area::get(['id','name']);
            $industry_id         = Industry::get(['id','name']);
            $major_id            = Major::get(['id','name']);
            $job_title_id        = JobTitle::get(['id','name']);
            $data[] = [
                'item'                => $item,
                'contact_source_id'   => $contact_source_id,
                'activity_id'         => $activity_id,
                'contact_category_id' => $contact_category_id,
                'city_id'             => $city_id,
                'area_id'             => $area_id,
                'industry_id'         => $industry_id,
                'major_id'            => $major_id,
                'job_title_id'        => $job_title_id,
            ];

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function update(UpdateRequest $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id'             => 'required|exists:users,id',
                'name'                => 'required|string',
                'mobile'              => 'required|numeric|unique:customers,mobile,'.$request->id,
                'national_id'         => 'nullable|numeric|unique:customers,national_id,'.$request->id,
                'contact_source_id'   => 'required|integer|exists:contact_sources,id',
                'activity_id'         => 'required|integer|exists:activates,id',
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

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            $data      = Customer::findOrFail($request->id);
            $inputs    = $request->except('photo');
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            $data->update([
                'name'                => $inputs['name'],
                'mobile'              => $inputs['mobile'],
                'contact_source_id'   => $inputs['contact_source_id'],
                'activity_id'         => $inputs['activity_id'],
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
                'industry_id'         => $inputs['industry_id '] ?? null,
            ]);
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
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }

            return $this->apiResponse($data, 'The Data Updated Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy(Request $request)
    {
        try {

            $data = Customer::findOrFail($request->id);
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



    public function storeParent(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id'             => 'required|exists:users,id',
                'parent_id'           => 'required|exists:customers,id',
                'name'                => 'required|string',
                'mobile'              => 'required|numeric|unique:customers,mobile,NULL,id,deleted_at,NULL',
                'national_id'         => 'nullable|numeric|unique:customers,national_id,NULL,id,deleted_at,NULL',
                'contact_source_id'   => 'required|integer|exists:contact_sources,id',
                'activity_id'         => 'required|integer|exists:activates,id',
                'job_title_id'        => 'nullable|integer|exists:job_titles,id',
                'city_id'             => 'nullable|integer|exists:cities,id',
                'area_id'             => 'nullable|integer|exists:areas,id',
                'contact_category_id' => 'nullable|integer|exists:contact_categories,id',
                'major_id'            => 'nullable|integer|exists:majors,id',
                'mobile2'             => 'nullable|numeric|unique:contacts,mobile2,NULL,id,deleted_at,NULL',
                'email'               => 'nullable|email|unique:contacts,email,NULL,id,deleted_at,NULL',
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
            $inputs['created_by'] = $auth_user->context_id;
            $data                 = Customer::create([
                'name'                => $inputs['name'],
                'mobile'              => $inputs['mobile'],
                'contact_source_id'   => $inputs['contact_source_id'],
                'activity_id'         => $inputs['activity_id'],
                'parent_id'           => $inputs['parent_id'],
                'created_by'          => $inputs['created_by'],
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
                'industry_id'         => $inputs['industry_id '] ?? null,
            ]);
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
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }

            return $this->apiResponse($data, 'The Data Stored Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function addInvoice(Request $request)
	{
        try {
            $validator = Validator::make($request->all(), [
                // 'auth_id'        => 'required|exists:users,id',
                'invoice_number' => 'required|string',
                'invoice_date'   => 'required|date',
                'total_amount'   => 'required|numeric',
                'amount_paid'    => 'required|numeric',
                'debt'           => 'required|numeric',
                'description'    => 'required|string',
                'status'         => 'required|string|in:draft,sent,paid,void',
                'activity_id'    => 'required|exists:activates,id',
                'interest_id'    => 'required|exists:interests,id',
                'customer_id'    => 'required|exists:customers,id',
            ]);

            if ($validator->fails()) {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user                 = User::findOrFail(auth()->guard('api')->user()->id);
            $dataInvoice               = $request->all();
            $dataInvoice['created_by'] = $auth_user->context_id;
            $data                      = Invoice::create([
                'invoice_number' => $dataInvoice['invoice_number'],
                'invoice_date'   => $dataInvoice['invoice_date'],
                'total_amount'   => $dataInvoice['total_amount'],
                'amount_paid'    => $dataInvoice['amount_paid'],
                'debt'           => $dataInvoice['debt'],
                'activity_id'    => $dataInvoice['activity_id'],
                'interest_id'    => $dataInvoice['interest_id'],
                'status'         => $dataInvoice['status'],
                'description'    => $dataInvoice['description'],
                'customer_id'    => $dataInvoice['customer_id'],
                'created_by'     => $dataInvoice['created_by'],
            ]);
            $addPointsService = new PointAdditionService();
            $addPointsService->addPoints($data->customer_id,$data->activity_id,$data->interest_id,$data->amount_paid);
            if($request->next_reorder_reminder)
            {
                ReorderReminder::create([
                    "customer_id"   => $data->customer_id,
                    "invoice_id"    => $data->id,
                    "reminder_date" => $request->next_reorder_reminder,
                ]);
            }
            return $this->apiResponse($data, 'The Data Stored Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}



    public function updateInvoice(Request $request)
	{
        try {
            $validator = Validator::make($request->all(), [
                // 'auth_id'        => 'required|exists:users,id',
                'invoice_number' => 'required|string',
                'invoice_date'   => 'required|date',
                'total_amount'   => 'required|numeric',
                'amount_paid'    => 'required|numeric',
                'debt'           => 'required|numeric',
                'description'    => 'required|string',
                'status'         => 'required|string|in:draft,sent,paid,void',
            ]);

            if ($validator->fails()) {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $inputs               = $request->all();
            $data                 = Invoice::find($request->id);
            $auth_user            = User::findOrFail(auth()->guard('api')->user()->id);
            $inputs['created_by'] = $auth_user->context_id;
            $data->update([
                'invoice_number' => $inputs['invoice_number'],
                'invoice_date'   => $inputs['invoice_date'],
                'total_amount'   => $inputs['total_amount'],
                'amount_paid'    => $inputs['amount_paid'],
                'debt'           => $inputs['debt'],
                'status'         => $inputs['status'],
                'description'    => $inputs['description'],
                'created_by'     => $inputs['created_by'],
            ]);
            if(!$data)
            {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Updated Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}



    public function addReminder(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'customer_id'     => 'required|exists:customers,id',
                'activity_id'     => 'required|exists:activates,id',
                'interest_id'     => 'required|exists:interests,id',
                'reminder_date'   => 'required|date',
                'expected_amount' => 'required',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }
            $data = ReorderReminder::create([
                'customer_id'    => $request->customer_id,
                'activity_id'    => $request->activity_id,
                'interest_id'    => $request->interest_id,
                'reminder_date'   => $request->reminder_date,
                'expected_amount' => $request->expected_amount,
            ]);
            if(!$data)
            {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Stored Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function addAttachment(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'files'       => 'required|array',
                'files.*'     => 'required|file|mimes:png,jpg,jpeg,webp',
                'customer_id' => 'required|exists:customers,id',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }
            $data = Customer::find($request->customer_id);
            //upload files
            $i = 1;
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $index => $file) {
                    $file_size = $file->getSize();
                    $file_type = $file->getMimeType();
                    $file_name = time() . $i . '.' . $file->getClientOriginalName();
                    $file->storeAs('customer', $file_name, 'attachments');
                    $data->files()->create([
                        'file_path' => asset('attachments/customer/' . $file_name),
                        'file_name' => $file_name,
                        'file_size' => $file_size,
                        'file_type' => $file_type,
                        'file_sort' => $i
                    ]);
                    $i++;
                }
            }
            if(!$data)
            {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Stored Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function deleteAttachment($id)
    {
        try {

            $media = Media::findOrFail($id);
            if (!$media) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            Storage::disk('attachments')->delete('customer/' . $media->file_name);
            $media->delete();

            return $this->apiResponse(null, 'The Data Deleted Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function postRetargetResults(Request $request)
	{
        try {

            $validator = Validator::make($request->all(), [
                'new_activity_id' => 'required',
                'new_interest_id' => 'required',
                'campaign_id'     => 'required',
                'customer_id'     => 'required|exists:customers,id',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $customer = Customer::find($request->customer_id);
            if(isset($customer->invoices->first()->activity->id))
            {
                $activity_id = $customer->invoices->first()->activity->id;
            }
            else
            {
                $activity_id = $request->new_activity_id;
            }
            $new_interest_id = $request->new_interest_id;
            if (!$request->new_activity_id || !$activity_id || !$request->new_interest_id || !$request->campaign_id)
            {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            else
            {
                $inputs = [];
                $inputs['ids']              = $request->customer_id;
                $inputs['new_activity_id']  = $request->new_activity_id;
                $inputs['new_interest_id']  = $request->new_interest_id;
                $inputs['campaign_id']      = $request->campaign_id;
                $inputs['activity_id']      = $activity_id;
            }
            $old_activity     = Activity::find($inputs['activity_id']);
            $new_activity     = Activity::find($inputs['new_activity_id']);
            $new_sub_activity = SubActivity::find($inputs['new_interest_id']);
            $name             = "إعادة استهداف ({$old_activity->name} إلي {$new_activity->name}) (فرعي: {$new_sub_activity->name}) ";
            //Create Compaign
            $campaign_id = $inputs['campaign_id'];
            if($campaign_id)
            {
                $campaign = Campaign::find($campaign_id);
                $name     = "تم اضافته الي حملة الاستهداف ". "( $campaign )". "بنجاح";
            }
            else
            {
                $campaign = Campaign::create([
                    'name' => $name
                ]);
            }
            //Create lead accounts
            // foreach ($inputs['ids'] as $id) {
                $id      = $inputs['ids'];
                $data    = Customer::find($id);
                $contact =  Contact::create([
                    'name'              => $data->name,
                    'mobile'            => $data->mobile,
                    'gender'            => $data->gender,
                    'email'             => $data->email,
                    'contact_source_id' => $data->contact_source_id,
                    'city_id'           => $data->city_id,
                    'area_id'           => $data->area_id,
                    'job_title_id'      => $data->job_title_id,
                    'industry_id'       => $data->industry_id,
                    'major_id'          => $data->major_id,
                    'created_by'        => $data->created_by,
                    'mobile2'           => $data->mobile2,
                    'company_name'      => $data->company_name,
                    'notes'             => $data->notes,
                    'activity_id'       => $request->new_activity_id,
                    'interest_id'       => $request->new_interest_id,
                    'campaign_id'       => $campaign->id,
                    'customer_id'       => $data->id,
                ]);
            // }
            return $this->apiResponse($data, 'The Data Stored Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}



    public function makePassword(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email'       => 'required|email|unique:customers,email,'.$request->customer_id,
                'password'    => 'required|string|min:6',
                'customer_id' => 'required|exists:customers,id',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }
            $data = Customer::findOrFail($request->customer_id);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            $data->update([
                'email'    => $request->email,
                'password' => $request->password,
            ]);
            return $this->apiResponse($data, 'The Data Stored Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
