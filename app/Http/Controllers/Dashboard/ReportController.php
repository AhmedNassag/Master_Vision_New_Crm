<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Branch;
use App\Models\Meeting;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Activity;
use App\Models\SubActivity;
use App\Models\Employee;
use App\Models\EmployeeTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:عرض تقارير المكالمات والزيارات', ['only' => ['meetings', 'meetingsReport']]);
        $this->middleware('permission:عرض تقارير جهات الإتصال', ['only' => ['contacts', 'contactsReport']]);
        $this->middleware('permission:عرض تقارير مبيعات الموظفين', ['only' => ['employeeSales', 'employeeSalesReport']]);
        $this->middleware('permission:عرض تقارير مبيعات الفروع', ['only' => ['branchSales', 'branchSalesReport']]);
        $this->middleware('permission:عرض تقارير مبيعات الأنشظة', ['only' => ['activitySales', 'activitySalesReport']]);
    }



    //meetings report
    public function meetings()
    {
        return View('dashboard.report.meetings');
    }



    public function meetingsReport(Request $request)
    {
        try {
            $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

            if(Auth::user()->roles_name[0] == "Admin")
            {
                $data = Meeting::with('notes','contact','createdBy')
                ->when($request->created_by != null,function ($q) use($request){
                    return $q->where('created_by', $request->created_by);
                })
                ->when($request->interests_ids != null,function ($q) use($request){
                    return $q->whereJsonContains('interests_ids', $request->interests_ids);
                })
                ->when($request->contact_id != null,function ($q) use($request){
                    return $q->where('contact_id', $request->contact_id);
                })
                ->when($request->contact_source_id != null, function ($q) use ($request) {
                    return $q->whereHas('contact', function ($query) use ($request) {
                        $query->where('contact_source_id', $request->contact_source_id);
                    });
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
                // ->paginate($perPage)->appends(request()->query());
                ->get();
            }
            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
            {
                $data = Meeting::with('notes','contact','createdBy')
                ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
                ->when($request->created_by != null,function ($q) use($request){
                    return $q->where('created_by', $request->created_by);
                })
                ->when($request->interests_ids != null,function ($q) use($request){
                    return $q->whereJsonContains('interests_ids', $request->interests_ids);
                })
                ->when($request->contact_id != null,function ($q) use($request){
                    return $q->where('contact_id', $request->contact_id);
                })
                ->when($request->contact_source_id != null, function ($q) use ($request) {
                    return $q->whereHas('contact', function ($query) use ($request) {
                        $query->where('contact_source_id', $request->contact_source_id);
                    });
                })
                ->when($request->follow_date_from != null,function ($q) use($request){
                    return $q->whereRelation('notes.follow_date', '>=', $request->follow_date_from);
                })
                ->when($request->follow_date_to != null,function ($q) use($request){
                    return $q->whereRelation('notes.follow_date', '>=', $request->follow_date_to);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                // ->paginate($perPage)->appends(request()->query());
                ->get();
            }
            else
            {
                $data = Meeting::with('notes','contact','createdBy')
                ->whereRelation('createdBy','id', auth()->user()->employee->id)
                ->when($request->created_by != null,function ($q) use($request){
                    return $q->where('created_by', $request->created_by);
                })
                ->when($request->interests_ids != null,function ($q) use($request){
                    return $q->whereJsonContains('interests_ids', $request->interests_ids);
                })
                ->when($request->contact_id != null,function ($q) use($request){
                    return $q->where('contact_id', $request->contact_id);
                })
                ->when($request->contact_source_id != null, function ($q) use ($request) {
                    return $q->whereHas('contact', function ($query) use ($request) {
                        $query->where('contact_source_id', $request->contact_source_id);
                    });
                })
                ->when($request->follow_date_from != null,function ($q) use($request){
                    return $q->whereRelation('notes.follow_date', '>=', $request->follow_date_from);
                })
                ->when($request->follow_date_to != null,function ($q) use($request){
                    return $q->whereRelation('notes.follow_date', '>=', $request->follow_date_to);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                // ->paginate($perPage)->appends(request()->query());
                ->get();
            }
            return view('dashboard.report.meetings',compact('data'))
            ->with([
                'created_by'        => $request->created_by,
                'interests_ids'     => $request->interests_ids,
                'contact_id'        => $request->contact_id,
                'contact_source_id' => $request->contact_source_id,
                'follow_date_from'  => $request->follow_date_from,
                'follow_date_to'    => $request->follow_date_from,
                'from_date'         => $request->from_date,
                'to_date'           => $request->to_date,
                'perPage'           => $perPage,
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    //contactMeetings report
    public function contactMeetings()
    {
        return View('dashboard.report.contactMeetings');
    }



    public function contactMeetingsReport(Request $request)
    {
        try {
            $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

            if(Auth::user()->roles_name[0] == "Admin")
            {
                $data = Meeting::with('notes','contact','createdBy')
                ->when($request->created_by != null,function ($q) use($request){
                    return $q->where('created_by', $request->created_by);
                })
                ->when($request->interests_ids != null,function ($q) use($request){
                    return $q->whereJsonContains('interests_ids', $request->interests_ids);
                })
                ->when($request->contact_id != null,function ($q) use($request){
                    return $q->where('contact_id', $request->contact_id);
                })
                ->when($request->contact_source_id != null, function ($q) use ($request) {
                    return $q->whereHas('contact', function ($query) use ($request) {
                        $query->where('contact_source_id', $request->contact_source_id);
                    });
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
                // ->paginate($perPage)->appends(request()->query())
                ->get()
                ->groupBy('contact_id');
            }
            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
            {
                $data = Meeting::with('notes','contact','createdBy')
                ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
                ->when($request->created_by != null,function ($q) use($request){
                    return $q->where('created_by', $request->created_by);
                })
                ->when($request->interests_ids != null,function ($q) use($request){
                    return $q->whereJsonContains('interests_ids', $request->interests_ids);
                })
                ->when($request->contact_id != null,function ($q) use($request){
                    return $q->where('contact_id', $request->contact_id);
                })
                ->when($request->contact_source_id != null, function ($q) use ($request) {
                    return $q->whereHas('contact', function ($query) use ($request) {
                        $query->where('contact_source_id', $request->contact_source_id);
                    });
                })
                ->when($request->follow_date_from != null,function ($q) use($request){
                    return $q->whereRelation('notes.follow_date', '>=', $request->follow_date_from);
                })
                ->when($request->follow_date_to != null,function ($q) use($request){
                    return $q->whereRelation('notes.follow_date', '>=', $request->follow_date_to);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                // ->paginate($perPage)->appends(request()->query())
                ->get()
                ->groupBy('contact_id');
            }
            else
            {
                $data = Meeting::with('notes','contact','createdBy')
                ->whereRelation('createdBy','id', auth()->user()->employee->id)
                ->when($request->created_by != null,function ($q) use($request){
                    return $q->where('created_by', $request->created_by);
                })
                ->when($request->interests_ids != null,function ($q) use($request){
                    return $q->whereJsonContains('interests_ids', $request->interests_ids);
                })
                ->when($request->contact_id != null,function ($q) use($request){
                    return $q->where('contact_id', $request->contact_id);
                })
                ->when($request->contact_source_id != null, function ($q) use ($request) {
                    return $q->whereHas('contact', function ($query) use ($request) {
                        $query->where('contact_source_id', $request->contact_source_id);
                    });
                })
                ->when($request->follow_date_from != null,function ($q) use($request){
                    return $q->whereRelation('notes.follow_date', '>=', $request->follow_date_from);
                })
                ->when($request->follow_date_to != null,function ($q) use($request){
                    return $q->whereRelation('notes.follow_date', '>=', $request->follow_date_to);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                // ->paginate($perPage)->appends(request()->query())
                ->get()
                ->groupBy('contact_id');
            }

            return view('dashboard.report.contactMeetings',compact('data'))
            ->with([
                'created_by'        => $request->created_by,
                'interests_ids'     => $request->interests_ids,
                'contact_id'        => $request->contact_id,
                'contact_source_id' => $request->contact_source_id,
                'follow_date_from'  => $request->follow_date_from,
                'follow_date_to'    => $request->follow_date_from,
                'from_date'         => $request->from_date,
                'to_date'           => $request->to_date,
                'perPage'           => $perPage,
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }







    //contacts report
    public function contacts()
    {
        return View('dashboard.report.contacts');
    }



    public function contactsReport(Request $request)
    {
        try {
            $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

            if(Auth::user()->roles_name[0] == "Admin")
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
                ->when($request->status != null,function ($q) use($request){
                    return $q->where('status', $request->status);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                // ->paginate($perPage)->appends(request()->query());
                ->get();
            }
            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
            {
                $data = Contact::with('jobTitle','contactCategory','contactSource','city','area','industry','major','activity','createdBy')
                // ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
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
                ->when($request->status != null,function ($q) use($request){
                    return $q->where('status', $request->status);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                // ->paginate($perPage)->appends(request()->query());
                ->get();
            }
            else
            {
                $data = Contact::with('jobTitle','contactCategory','contactSource','city','area','industry','major','activity','createdBy')
                ->whereRelation('createdBy','id', auth()->user()->employee->id)
                ->orWhere('employee', auth()->user()->employee->id)
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
                ->when($request->status != null,function ($q) use($request){
                    return $q->where('status', $request->status);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                // ->paginate($perPage)->appends(request()->query());
                ->get();
            }

            $resultCount = $data->count();

            return view('dashboard.report.contacts',compact('data','resultCount'))
            ->with([
                'created_by'          => $request->created_by,
                'city_id'             => $request->city_id,
                'area_id'             => $request->area_id,
                'contact_source_id'   => $request->contact_source_id,
                'contact_category_id' => $request->contact_category_id,
                'industry_id'         => $request->industry_id,
                'major_id'            => $request->major_id,
                'job_title_id'        => $request->job_title_id,
                'activity_id'         => $request->activity_id,
                'status'              => $request->status,
                'from_date'           => $request->from_date,
                'to_date'             => $request->to_date,
                'perPage'             => $perPage,
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }







    //employeeSales report
    public function employeeSales()
    {
        return View('dashboard.report.employeeSales');
    }



    public function employeeSalesReport(Request $request)
    {
        try {
            if(Auth::user()->roles_name[0] == "Admin")
            {
                $employees = Employee::hidden()
                ->when($request->branch_id != null,function ($q) use($request){
                    return $q->where('branch_id',$request->branch_id);
                })
                ->when($request->employee_id != null,function ($q) use($request){
                    return $q->where('id',$request->employee_id);
                })
                ->get();
            }
            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
            {
                $employees = Employee::hidden()->where('branch_id', auth()->user()->employee->branch_id)
                ->when($request->employee_id != null,function ($q) use($request){
                    return $q->where('id',$request->employee_id);
                })
                ->get();
            }
            else
            {
                $employees = Employee::hidden()->where('id', auth()->user()->employee->id)->get();
            }

            $data = [];
            foreach ($employees as $index=>$employee)
            {
                /****************************** start target_amount ******************************/
                $target_amount = EmployeeTarget::where('employee_id', $employee->id)
                    ->where('month', Carbon::create($request->month)->format('M-Y'))
                    ->sum('target_amount');

                $actual_amount = Invoice::where('created_by', $employee->id)
                    ->where(DB::raw('DATE_FORMAT(invoice_date, "%Y-%m")'), $request->month)
                    ->sum('total_amount');

                $uniqueCustomerCount = Invoice::where('created_by', $employee->id)
                    ->where(DB::raw('DATE_FORMAT(invoice_date, "%Y-%m")'), $request->month)
                    ->distinct('customer_id')
                    ->count();

                // Calculate the margin percentage
                $margin_amount = ($actual_amount > 0 && $target_amount > 0) ? ($actual_amount / $target_amount) * 100 : 0;
                /****************************** end target_amount ******************************/



                /****************************** start calls_with_repeater ******************************/
                $actual_calls_with_repeater = Meeting::where('created_by', $employee->id)
                    ->where('meeting_date', 'LIKE', $request->month . '%')
                    ->count();

                $target_calls_with_repeater = EmployeeTarget::where('employee_id', $employee->id)
                    ->where('month', Carbon::create($request->month)->format('M-Y'))
                    ->sum('target_meeting');

                // Calculate the margin_calls_with_repeater percentage
                $margin_calls_with_repeater = ($actual_calls_with_repeater > 0 && $target_calls_with_repeater > 0) ? ($actual_calls_with_repeater / $target_calls_with_repeater) * 100 : 0;
                /****************************** end calls_with_repeater ******************************/



                /****************************** start target_calls_without_repeater ******************************/
                $target_calls_without_repeater = EmployeeTarget::where('employee_id', $employee->id)
                    ->where('month', Carbon::create($request->month)->format('M-Y'))
                    ->sum('target_contact');

                $actual_calls_without_repeater = Meeting::where('created_by', $employee->id)
                    ->where('meeting_date', 'LIKE', $request->month . '%')
                    ->distinct('contact_id')
                    ->count();

                // Calculate the margin_calls_without_repeater percentage
                $margin_calls_without_repeater = ($actual_calls_without_repeater > 0 && $target_calls_without_repeater > 0) ? ($actual_calls_without_repeater / $target_calls_without_repeater) * 100 : 0;
                /****************************** end calls_without_repeater ******************************/



                // Create a data entry for the report
                $data[] = [
                    'branch'                        => Branch::find($employee->branch_id)->name ?? "", // You can add the year if needed
                    'employee'                      => $employee->name,

                    'target_amount'                 => $target_amount,
                    'actual_amount'                 => $actual_amount,
                    'margin_amount'                 => number_format($margin_amount, 2) . "%",
                    'customers_count'               => $uniqueCustomerCount,

                    'target_calls_with_repeater'    => $target_calls_with_repeater,
                    'actual_calls_with_repeater'    => $actual_calls_with_repeater,
                    'margin_calls_with_repeater'    => number_format($margin_calls_with_repeater, 2) . "%",

                    'target_calls_without_repeater' => $target_calls_without_repeater,
                    'actual_calls_without_repeater' => $actual_calls_without_repeater,
                    'margin_calls_without_repeater' => number_format($margin_calls_without_repeater, 2) . "%",
                ];
            }

            return view('dashboard.report.employeeSales',compact('data'))
            ->with([
                'month'       => $request->month,
                'branch_id'   => $request->branch_id,
                'employee_id' => $request->employee_id,
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }







    //branchSales report
    public function branchSales()
    {
        return View('dashboard.report.branchSales');
    }



    public function branchSalesReport(Request $request)
    {
        try {
            if(Auth::user()->roles_name[0] == "Admin")
            {
                $branches = Branch::get();
            }
            else
            {
                $branches = Branch::where('id', auth()->user()->employee->branch_id)->get();
            }
            $data = [];
            foreach ($branches as $branch)
            {
                if(Auth::user()->roles_name[0] == "Admin")
                {
                    $employees = Employee::hidden()->where('branch_id', $branch->id)->get();
                }
                else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                {
                    $employees = Employee::hidden()->where('branch_id', $branch->id)->get();
                }
                else
                {
                    $employees = Employee::hidden()->where('branch_id', $branch->id)->where('id', auth()->user()->employee->id)->get();
                }
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
                    if($target != 0) {
                        $margin = ($actual > 0) ? ($actual / $target) * 100 : 0;
                    } else {
                        $margin = 0;
                    }
                    $reportData['target'] += $target;
                    $reportData['actual'] += $actual;
                    // Create a data entry for the report

                }
                $margin = ($reportData['actual'] > 0 && $reportData['target'] > 0) ? ($reportData['actual'] / $reportData['target']) * 100 : 0;
                $reportData['margin'] = number_format($margin, 0) . "%";
                $reportData['target'] = number_format($reportData['target'],0);
                $reportData['actual'] = number_format($reportData['actual'],0);
                $data[] = $reportData;
            }

            return view('dashboard.report.branchSales',compact('data'))
            ->with([
                'month' => $request->month,
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }







    //activity sales report
    public function activitySales()
    {
        return View('dashboard.report.activitySales');
    }



    public function activitySalesReport(Request $request)
    {
        try {
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

            return view('dashboard.report.activitySales',compact('data'))
            ->with([
                'from_date'   => $request->from_date,
                'to_date'     => $request->to_date,
                'activity_id' => $request->activity_id,
                'interest_id' => $request->interest_id,
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
