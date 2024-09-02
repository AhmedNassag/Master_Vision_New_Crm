<?php

namespace App\Http\Controllers\Api\Admin;

use Carbon\Carbon;
use App\Models\Branch;
use App\Models\Meeting;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Activity;
use App\Models\SubActivity;
use App\Models\Employee;
use App\Models\ContactSource;
use App\Models\EmployeeTarget;
use App\Models\City;
use App\Models\Area;
use App\Models\ContactCategory;
use App\Models\Industry;
use App\Models\Major;
use App\Models\JobTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponseTrait;

class ReportController extends Controller
{
    use ApiResponseTrait;

    function __construct()
    {
        $this->middleware('permission:عرض تقارير المكالمات والزيارات', ['only' => ['meetings', 'meetingsReport']]);
        $this->middleware('permission:عرض تقارير جهات الإتصال', ['only' => ['contacts', 'contactsReport']]);
        $this->middleware('permission:عرض تقارير مبيعات الموظفين', ['only' => ['employeeSales', 'employeeSalesReport']]);
        $this->middleware('permission:عرض تقارير مبيعات الفروع', ['only' => ['branchSales', 'branchSalesReport']]);
        $this->middleware('permission:عرض تقارير مبيعات الأنشظة', ['only' => ['activitySales', 'activitySalesReport']]);
    }



    //meetings report
    public function meetings(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id' => 'required|exists:users,id',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user         = User::findOrFail(auth()->guard('api')->user()->id);
            $interests_ids     = SubActivity::get(['id','name']);
            $contact_source_id = ContactSource::get(['id','name']);
            if($auth_user->roles_name[0] == "Admin")
            {
                $contact_id = Contact::get(['id','name']);
            }
            else if($auth_user->roles_name[0] != "Admin" && $auth_user->employee->has_branch_access == 1)
            {
                $contact_id = Contact::
                // whereRelation('createdBy','branch_id', $auth_user->employee->branch_id)
                where(function ($query) use ($request) {
                    $query->whereRelation('createdBy', 'branch_id', auth()->user()->employee->branch_id)
                    ->orWhereRelation('employee', 'branch_id', auth()->user()->employee->branch_id)
                    ->orWhere('created_by', auth()->user()->employee->id)
                    ->orWhere('branch_id', auth()->user()->employee->branch_id)
                    ->orWhere('employee_id', auth()->user()->employee->id);
                })
                ->get(['id','name']);
            }
            else
            {
                $contact_id = Contact::where('employee_id', $auth_user->employee->id)->get(['id','name']);
            }

            if($auth_user->roles_name[0] == "Admin")
            {
                $created_by = Employee::hidden()->get(['id','name']);
            }
            else
            {
                $created_by = Employee::hidden()->where('branch_id', $auth_user->employee->branch_id)->get(['id','name']);
            }

            $data[] = [
                'interests_ids'     => $interests_ids,
                'contact_source_id' => $contact_source_id,
                'contact_id'        => $contact_id,
                'created_by'        => $created_by,
            ];

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function meetingsReport(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id'           => 'required|exists:users,id',
                'created_by'        => 'nullable|exists:employees,id',
                'interests_ids'     => 'nullable|exists:interests,id',
                'contact_id'        => 'nullable|exists:contacts,id',
                'contact_source_id' => 'nullable|exists:contact_sources,id',
                'follow_date_from'  => 'nullable|date',
                'follow_date_to'    => 'nullable|date',
                'from_date'         => 'nullable|date',
                'to_date'           => 'nullable|date',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            if($auth_user->roles_name[0] == "Admin")
            {
                $data = Meeting::with(['notes', 'contact', 'createdBy', 'creator', 'interests', 'reply'])
                ->when($request->created_by != null,function ($q) use($request){
                    return $q->where('created_by', $request->created_by);
                })
                ->when($request->interests_ids != null,function ($q) use($request){
                    return $q->where('interests_ids', $request->interests_ids);
                })
                ->when($request->contact_id != null,function ($q) use($request){
                    return $q->where('contact_id', $request->contact_id);
                })
                ->when($request->contact_source_id != null,function ($q) use($request){
                    return $q->whereRelation('contact','contact_source_id', $request->contact_source_id);
                })
                ->when($request->follow_date_from != null,function ($q) use($request){
                    return $q->whereRelation('notes','follow_date', '>=', $request->follow_date_from);
                })
                ->when($request->follow_date_to != null,function ($q) use($request){
                    return $q->whereRelation('notes','follow_date', '>=', $request->follow_date_to);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                ->paginate(config('myConfig.paginationCount'));
            }
            else if($auth_user->roles_name[0] != "Admin" && $auth_user->employee->has_branch_access == 1)
            {
                $data = Meeting::with(['notes', 'contact', 'createdBy', 'creator', 'interests', 'reply'])
                ->whereRelation('createdBy','branch_id', $auth_user->employee->branch_id)
                ->when($request->created_by != null,function ($q) use($request){
                    return $q->where('created_by', $request->created_by);
                })
                ->when($request->interests_ids != null,function ($q) use($request){
                    return $q->where('interests_ids', $request->interests_ids);
                })
                ->when($request->contact_id != null,function ($q) use($request){
                    return $q->where('contact_id', $request->contact_id);
                })
                ->when($request->contact_source_id != null,function ($q) use($request){
                    return $q->whereRelation('contact.contact_source_id', $request->contact_source_id);
                })
                ->when($request->follow_date_from != null,function ($q) use($request){
                    return $q->whereRelation('notes','follow_date', '>=', $request->follow_date_from);
                })
                ->when($request->follow_date_to != null,function ($q) use($request){
                    return $q->whereRelation('notes','follow_date', '>=', $request->follow_date_to);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                ->paginate(config('myConfig.paginationCount'));
            }
            else
            {
                $data = Meeting::with(['notes', 'contact', 'createdBy', 'creator', 'interests', 'reply'])
                ->whereRelation('createdBy','id', $auth_user->employee->id)
                ->when($request->created_by != null,function ($q) use($request){
                    return $q->where('created_by', $request->created_by);
                })
                ->when($request->interests_ids != null,function ($q) use($request){
                    return $q->where('interests_ids', $request->interests_ids);
                })
                ->when($request->contact_id != null,function ($q) use($request){
                    return $q->where('contact_id', $request->contact_id);
                })
                ->when($request->contact_source_id != null,function ($q) use($request){
                    return $q->whereRelation('contact.contact_source_id', $request->contact_source_id);
                })
                ->when($request->follow_date_from != null,function ($q) use($request){
                    return $q->whereRelation('notes','follow_date', '>=', $request->follow_date_from);
                })
                ->when($request->follow_date_to != null,function ($q) use($request){
                    return $q->whereRelation('notes','follow_date', '>=', $request->follow_date_to);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                ->paginate(config('myConfig.paginationCount'));
            }

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }







    //contacts report
    public function contacts(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id' => 'required|exists:users,id',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user           = User::findOrFail(auth()->guard('api')->user()->id);
            $city_id             = City::get(['id', 'name']);
            $area_id             = Area::get(['id', 'name']);
            $contact_source_id   = ContactSource::get(['id', 'name']);
            $contact_category_id = ContactCategory::get(['id', 'name']);
            $industry_id         = Industry::get(['id', 'name']);
            $major_id            = Major::get(['id', 'name']);
            $job_title_id        = JobTitle::get(['id', 'name']);
            $activity_id         = Activity::get(['id', 'name']);
            if($auth_user->roles_name[0] == "Admin")
            {
                $created_by = Employee::hidden()->get(['id','name']);
            }
            else
            {
                $created_by = Employee::hidden()->where('branch_id', $auth_user->employee->branch_id)->get(['id','name']);
            }

            $data[] = [
                'city_id'             => $city_id,
                'area_id'             => $area_id,
                'contact_source_id'   => $contact_source_id,
                'contact_category_id' => $contact_category_id,
                'industry_id'         => $industry_id,
                'major_id'            => $major_id,
                'job_title_id'        => $job_title_id,
                'activity_id'         => $activity_id,
                'created_by'          => $created_by,
            ];

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function contactsReport(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id'             => 'required|exists:users,id',
                'created_by'          => 'nullable|exists:employees,id',
                'city_id'             => 'nullable|exists:cities,id',
                'area_id'             => 'nullable|exists:areas,id',
                'contact_source_id'   => 'nullable|exists:contact_sources,id',
                'contact_category_id' => 'nullable|exists:contact_contact_categories,id',
                'industry_id'         => 'nullable|exists:contact_contact_industries,id',
                'major_id'            => 'nullable|exists:majors,id',
                'job_title_id'        => 'nullable|exists:job_titles,id',
                'activity_id'         => 'nullable|exists:activates,id',
                'from_date'           => 'nullable|date',
                'to_date'             => 'nullable|date',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            if($auth_user->roles_name[0] == "Admin")
            {
                $data = Contact::with('jobTitle','contactCategory','contactSource','city','area','industry','major','activity','createdBy')
                ->when($request->created_by != null,function ($q) use($request){
                    return $q->where('created_by', $request->created_by);
                })
                ->when($request->city_id != null,function ($q) use($request){
                    return $q->where('city_id', $request->city_id);
                })
                ->when($request->area_id != null,function ($q) use($request){
                    return $q->where('area_id', $request->area_id);
                })
                ->when($request->contact_source_id != null,function ($q) use($request){
                    return $q->where('contact_source_id', $request->contact_source_id);
                })
                ->when($request->contact_category_id != null,function ($q) use($request){
                    return $q->where('contact_category_id', $request->contact_category_id);
                })
                ->when($request->industry_id != null,function ($q) use($request){
                    return $q->where('industry_id', $request->industry_id);
                })
                ->when($request->major_id != null,function ($q) use($request){
                    return $q->where('major_id', $request->major_id);
                })
                ->when($request->job_title_id != null,function ($q) use($request){
                    return $q->where('job_title_id', $request->job_title_id);
                })
                ->when($request->activity_id != null,function ($q) use($request){
                    return $q->where('activity_id', $request->activity_id);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                ->paginate(config('myConfig.paginationCount'));
            }
            else if($auth_user->roles_name[0] != "Admin" && $auth_user->employee->has_branch_access == 1)
            {
                $data = Contact::with('jobTitle','contactCategory','contactSource','city','area','industry','major','activity','createdBy')
                // ->whereRelation('createdBy','branch_id', $auth_user->employee->branch_id)
                ->where(function ($query) use ($request) {
                    $query->whereRelation('createdBy', 'branch_id', auth()->user()->employee->branch_id)
                    ->orWhereRelation('employee', 'branch_id', auth()->user()->employee->branch_id)
                    ->orWhere('created_by', auth()->user()->employee->id)
                    ->orWhere('branch_id', auth()->user()->employee->branch_id)
                    ->orWhere('employee_id', auth()->user()->employee->id);
                })
                ->when($request->created_by != null,function ($q) use($request){
                    return $q->where('created_by', $request->created_by);
                })
                ->when($request->city_id != null,function ($q) use($request){
                    return $q->where('city_id', $request->city_id);
                })
                ->when($request->area_id != null,function ($q) use($request){
                    return $q->where('area_id', $request->area_id);
                })
                ->when($request->contact_source_id != null,function ($q) use($request){
                    return $q->where('contact_source_id', $request->contact_source_id);
                })
                ->when($request->contact_category_id != null,function ($q) use($request){
                    return $q->where('contact_category_id', $request->contact_category_id);
                })
                ->when($request->industry_id != null,function ($q) use($request){
                    return $q->where('industry_id', $request->industry_id);
                })
                ->when($request->major_id != null,function ($q) use($request){
                    return $q->where('major_id', $request->major_id);
                })
                ->when($request->job_title_id != null,function ($q) use($request){
                    return $q->where('job_title_id', $request->job_title_id);
                })
                ->when($request->activity_id != null,function ($q) use($request){
                    return $q->where('activity_id', $request->activity_id);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                ->paginate(config('myConfig.paginationCount'));
            }
            else
            {
                $data = Contact::with('jobTitle','contactCategory','contactSource','city','area','industry','major','activity','createdBy')
                ->whereRelation('createdBy','id', $auth_user->employee->id)
                ->orWhere('employee_id',$auth_user->employee->id)
                ->when($request->created_by != null,function ($q) use($request){
                    return $q->where('created_by', $request->created_by);
                })
                ->when($request->city_id != null,function ($q) use($request){
                    return $q->where('city_id', $request->city_id);
                })
                ->when($request->area_id != null,function ($q) use($request){
                    return $q->where('area_id', $request->area_id);
                })
                ->when($request->contact_source_id != null,function ($q) use($request){
                    return $q->where('contact_source_id', $request->contact_source_id);
                })
                ->when($request->contact_category_id != null,function ($q) use($request){
                    return $q->where('contact_category_id', $request->contact_category_id);
                })
                ->when($request->industry_id != null,function ($q) use($request){
                    return $q->where('industry_id', $request->industry_id);
                })
                ->when($request->major_id != null,function ($q) use($request){
                    return $q->where('major_id', $request->major_id);
                })
                ->when($request->job_title_id != null,function ($q) use($request){
                    return $q->where('job_title_id', $request->job_title_id);
                })
                ->when($request->activity_id != null,function ($q) use($request){
                    return $q->where('activity_id', $request->activity_id);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                ->paginate(config('myConfig.paginationCount'));
            }

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }







    //employeeSales report
    public function employeeSales(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id' => 'required|exists:users,id',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            if($auth_user->roles_name[0] == "Admin")
            {
                $branches = Branch::get(['id','name']);
            }
            else
            {
                $branches = Branch::where('id', $auth_user->employee->branch_id)->get(['id','name']);
            }

            $month_format = 'M-Y';
            $year_month   = [];
            $currentYear  = date('Y');
            $date         = Carbon::create($currentYear, 1, 1);
            for ($i = 1; $i <= date('n'); $i++)
            {
                $year_month[$date->format('Y-m')] = $date->format($month_format);
                $date->addMonth();
            }

            $data[] = [
                'branches' => $branches,
                'month'    => $year_month,
            ];

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function employeeSalesReport(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id'   => 'required|exists:users,id',
                'branch_id' => 'nullable|exists:branches,id',
                'month'     => 'nullable',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            if($request->branch_id)
            {
                $employees = Employee::hidden()->when($request->branch_id, function ($query) use ($request) {
                    return $query->where('branch_id', $request->branch_id);
                })->get();
            }
            else
            {
                if($auth_user->roles_name[0] == "Admin")
                {
                    $employees = Employee::hidden()->get();
                }
                else
                {
                    $employees = Employee::hidden()->where('branch_id', $auth_user->employee->branch_id)->get();
                }
            }
            $data = [];
            foreach ($employees as $index=>$employee)
            {
                // Get the target for the current employee and year
                $target = EmployeeTarget::where('employee_id', $employee->id)
                ->where('month', Carbon::create($request->month)->format('M-Y'))
                ->sum('target_amount');

                // $targetCalls = Employee_target::where('employee_id', $employee->id)
                //     ->where('month', $request->month)
                //     ->sum('target_calls');
                // $actualCalls = Meeting::where('employee_id', $employee->id)
                //     ->where('month', $request->month)
                //     ->sum('target_calls');

                // Get the actual total amount for invoices created by the current employee and year
                $actual = Invoice::where('created_by', $employee->id)
                ->where(DB::raw('DATE_FORMAT(invoice_date, "%Y-%m")'), $request->month)
                ->sum('total_amount');

                $uniqueCustomerCount = Invoice::where('created_by', $employee->id)
                ->where(DB::raw('DATE_FORMAT(invoice_date, "%Y-%m")'), $request->month)
                ->distinct('customer_id')
                ->count();

                // Calculate the margin percentage
                $margin = ($actual > 0 && $target > 0) ? ($actual / $target) * 100 : 0;

                // Create a data entry for the report
                $data[] = [
                    'employee'        => $employee->name, // Replace 'name' with the actual column name in your Employee model
                    'target'          => $target,
                    'actual'          => $actual,
                    'margin'          =>  number_format($margin, 2) . "%",
                    'customers_count' => $uniqueCustomerCount,
                    'branch'          => Branch::find($employee->branch_id)->name ?? "", // You can add the year if needed
                ];
            }

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }







    //branchSales report
    public function branchSales()
    {
        try {

            $month_format = 'M-Y';
            $year_month   = [];
            $currentYear  = date('Y');
            $date         = Carbon::create($currentYear, 1, 1);
            for ($i = 1; $i <= date('n'); $i++)
            {
                $year_month[$date->format('Y-m')] = $date->format($month_format);
                $date->addMonth();
            }
            $data[] = [
                'month' => $year_month,
            ];

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function branchSalesReport(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id' => 'required|exists:users,id',
                'month'   => 'nullable',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            if($auth_user->roles_name[0] == "Admin")
            {
                $branches = Branch::get();
            }
            else
            {
                $branches = Branch::where('id', $auth_user->employee->branch_id)->get();
            }
            $data = [];
            foreach ($branches as $branch)
            {
                $employees  = Employee::hidden()->where('branch_id', $branch->id)->get();
                $reportData = [
                    'branch' => $branch->name, // Replace 'name' with the actual column name in your Employee model
                    'target' => 0,
                    'actual' => 0,
                ];
                foreach ($employees as $employee)
                {
                    // Get the target for the current employee and year
                    $target = EmployeeTarget::where('employee_id', $employee->id)
                    ->where('month', Carbon::create($request->month)->format('M-Y'))
                    ->sum('target_amount');

                    // Get the actual total amount for invoices created by the current employee and year
                    $actual = Invoice::where('created_by', $employee->id)
                    ->where(DB::raw('DATE_FORMAT(invoice_date, "%Y-%m")'), $request->month)
                    ->sum('total_amount');

                    // Calculate the margin percentage
                    $margin = ($actual > 0) ? ($actual / $target) * 100 : 0;
                    $reportData['target'] += $target;
                    $reportData['actual'] += $actual;
                    // Create a data entry for the report

                }
                $margin               = ($reportData['actual'] > 0 && $reportData['target'] > 0) ? ($reportData['actual'] / $reportData['target']) * 100 : 0;
                $reportData['margin'] = number_format($margin, 0) . "%";
                $reportData['target'] = number_format($reportData['target'],0);
                $reportData['actual'] = number_format($reportData['actual'],0);
                $data[]               = $reportData;
            }

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }







    //activity sales report
    public function activitySales()
    {
        try {

            $activity_id = Activity::get(['id', 'name']);
            $interest_id = SubActivity::get(['id', 'name']);

            $data[] = [
                'activity_id' => $activity_id,
                'interest_id' => $interest_id,
            ];

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function activitySalesReport(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'activity_id' => 'nullable|exists:activates,id',
                'interest_id' => 'nullable|exists:interests,id',
                'from_date'   => 'nullable|date',
                'to_date'     => 'nullable|date',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $from        = $request->from_date;
            $to          = $request->to_date;
            $activity_id = $request->activity_id;
            $interest_id = $request->interest_id;
            $data        = [];
            if ($interest_id)
            {
                $invoices = Invoice::where('activity_id', $activity_id)
                ->where('interest_id', $interest_id)
                ->when(($from != "" && $to != ""), function ($query) use ($from, $to) {
                    return $query->whereBetween('invoice_date', [$from, $to]);
                })->get();

                $data[] = [
                    'activity'          => Activity::find($activity_id)->name ?? "",
                    'sub_activity'      => SubActivity::find($interest_id)->name ?? "",
                    'total_sales'       => number_format($invoices->sum('total_amount'),0),
                    'paid_amount'       => number_format($invoices->sum('amount_paid'),0),
                    'remaining_amounts' => number_format($invoices->sum('total_amount') - $invoices->sum('amount_paid'),0),
                ];
            }
            elseif ($activity_id && !$interest_id)
            {
                $invoices = Invoice::where('activity_id', $activity_id)
                ->when(($from != "" && $to != ""), function ($query) use ($from, $to) {
                    return $query->whereBetween('invoice_date', [$from, $to]);
                })->get();

                $data[] = [
                    'activity'          => Activity::find($activity_id)->name ?? "",
                    'sub_activity'      => "",
                    'total_sales'       => number_format($invoices->sum('total_amount'),0),
                    'paid_amount'       => number_format($invoices->sum('amount_paid'),0),
                    'remaining_amounts' => number_format($invoices->sum('total_amount') - $invoices->sum('amount_paid'),0),
                ];
            }
            else
            {
                $activites = Activity::all();
                foreach ($activites as $activity)
                {
                    $invoices = Invoice::where('activity_id', $activity->id)
                    ->when(($from != "" && $to != ""), function ($query) use ($from, $to) {
                        return $query->whereBetween('invoice_date', [$from, $to]);
                    })->get();

                    $data[] = [
                        'activity'          => $activity->name ?? "",
                        'sub_activity'      => "",
                        'total_sales'       => number_format($invoices->sum('total_amount'),0),
                        'paid_amount'       => number_format($invoices->sum('amount_paid'),0),
                        'remaining_amounts' => number_format($invoices->sum('total_amount') - $invoices->sum('amount_paid'),0),
                    ];
                }
            }

            return $this->apiResponse($data, 'The Data Returned Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
