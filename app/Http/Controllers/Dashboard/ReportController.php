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
            if(Auth::user()->roles_name[0] == "Admin")
            {
                $data = Meeting::with('notes','contact','createdBy')
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
                    return $q->whereRelation('notes.follow_date_from', '>=', $request->follow_date_from);
                })
                ->when($request->follow_date_to != null,function ($q) use($request){
                    return $q->whereRelation('notes.follow_date_to', '>=', $request->follow_date_to);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                ->paginate(config('myConfig.paginationCount'));
            }
            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
            {
                $data = Meeting::with('notes','contact','createdBy')
                ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
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
                    return $q->whereRelation('notes.follow_date_from', '>=', $request->follow_date_from);
                })
                ->when($request->follow_date_to != null,function ($q) use($request){
                    return $q->whereRelation('notes.follow_date_to', '>=', $request->follow_date_to);
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
                $data = Meeting::with('notes','contact','createdBy')
                ->whereRelation('createdBy','id', auth()->user()->employee->id)
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
                    return $q->whereRelation('notes.follow_date_from', '>=', $request->follow_date_from);
                })
                ->when($request->follow_date_to != null,function ($q) use($request){
                    return $q->whereRelation('notes.follow_date_to', '>=', $request->follow_date_to);
                })
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                ->paginate(config('myConfig.paginationCount'));
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
                ->when($request->from_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '>=', $request->from_date);
                })
                ->when($request->to_date != null,function ($q) use($request){
                    return $q->whereDate('created_at', '<=', $request->to_date);
                })
                ->paginate(config('myConfig.paginationCount'));
            }
            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
            {
                $data = Contact::with('jobTitle','contactCategory','contactSource','city','area','industry','major','activity','createdBy')
                ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
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
                ->whereRelation('createdBy','id', auth()->user()->employee->id)
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

            return view('dashboard.report.contacts',compact('data'))
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
                'from_date'           => $request->from_date,
                'to_date'             => $request->to_date,
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
            if($request->branch_id)
            {
                $employees = Employee::when($request->branch_id, function ($query) use ($request) {
                    return $query->where('branch_id', $request->branch_id);
                })->get();
            }
            else
            {
                if(Auth::user()->roles_name[0] == "Admin")
                {
                    $employees = Employee::get();
                }
                else
                {
                    $employees = Employee::where('branch_id', auth()->user()->employee->branch_id)->get();
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
                    'customers_count' => $uniqueCustomerCount,
                    'margin'          =>  number_format($margin, 2) . "%",
                    'branch'          => Branch::find($employee->branch_id)->name ?? "", // You can add the year if needed
                ];
            }

            return view('dashboard.report.employeeSales',compact('data'))
            ->with([
                'month'     => $request->month,
                'branch_id' => $request->branch_id,
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
                $employees = Employee::where('branch_id', $branch->id)->get();
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
