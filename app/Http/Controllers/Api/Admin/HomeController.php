<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\EmployeeTarget;
use App\Models\Meeting;
use App\Models\Employee;
use App\Models\Contact;
use App\Models\ContactSource;
use App\Models\City;
use App\Models\User;
use App\Models\Area;
use App\Models\SubActivity;
use App\Models\ReorderReminder;
use App\Models\Branch;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;

class HomeController extends Controller
{
    use ApiResponseTrait;

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id' => 'required|exists:users,id',
            ]);
            if ($validator->fails()) {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $user         = User::with('media')->findOrFail(auth()->guard('api')->user()->id);
            $target       = EmployeeTarget::where("employee_id",$user->context_id)->where("month",date("Y-m"))->first();
            $did_amount   = Meeting::where("created_by",$user->context_id)->sum("revenue");
            $did_meetings = Meeting::where("created_by",$user->context_id)->count();
            $emps = [];
            foreach($user->roles as $role) {
                if ($role->name = "admin") {
                    $emps = Employee::hidden()->pluck('id')->toArray();
                }
                else {
                    $emps = Employee::hidden()->where("dept", $user->employee->dept)->pluck('id')->toArray();
                }
            }

            //contacts
            $contacts = Contact::get();
            //follow today
            $follow_today = Meeting::whereHas("notes",function($q) {
                $q->whereRaw(\DB::raw("follow_date=CURDATE()"));
            });
            $first_day = date("Y-m-")."01";

            //in and out calls today
            $calls_in_today = Meeting::where("type","call")
            ->where("meeting_place","in")->whereRaw(\DB::raw("meeting_date=CURDATE()"));

            $calls_out_today = Meeting::where("type","call")
            ->where("meeting_place","out")->whereRaw(\DB::raw("meeting_date=CURDATE()"));

            //in and out call this month
            $calls_in_month = Meeting::where("type","call")
            ->where("meeting_place","in")->whereRaw(\DB::raw("meeting_date>='$first_day'"));

            $calls_out_month = Meeting::where("type","call")
            ->where("meeting_place","out")->whereRaw(\DB::raw("meeting_date>='$first_day'"));

            //in and out meetings today
            $meetings_in_today = Meeting::where("type","meeting")
            ->where("meeting_place","in")->whereRaw(\DB::raw("meeting_date=CURDATE()"));

            $meetings_out_today = Meeting::where("type","meeting")
            ->where("meeting_place","out")->whereRaw(\DB::raw("meeting_date=CURDATE()"));

            //in and out meetings this month
            $meetings_in_month = Meeting::where("type","meeting")
            ->where("meeting_place","in")->whereRaw(\DB::raw("meeting_date>='$first_day'"));

            $meetings_out_month = Meeting::where("type","meeting")
            ->where("meeting_place","out")->whereRaw(\DB::raw("meeting_date>='$first_day'"));

            //top client sources
            $sources = ContactSource::withCount(['contacts'=>function($q) use ($emps){
                $q->whereNull("deleted_at");
                if(count($emps)>0) {
                    $q->whereIn("created_by",$emps);
                }
            }])->having("contacts_count",">",0)->orderBy("contacts_count","desc")->take(5)->get();

            //top cities
            $cities = City::withCount(['contacts'=>function($q) use ($emps) {
                $q->whereNull("deleted_at");
                if(count($emps)>0) {
                    $q->whereIn("created_by",$emps);
                }
            }])->having("contacts_count",">",0)->orderBy("contacts_count","desc")->take(5)->get();

            //top areas
            $areas = Area::withCount(['contacts'=>function($q) use ($emps) {
                $q->whereNull("deleted_at");
                if(count($emps)>0) {
                    $q->whereIn("created_by",$emps);
                }
            }])->having("contacts_count",">",0)->orderBy("contacts_count","desc")->take(5)->get();

            //top 5 intersets
            $interests = SubActivity::withCount(['meetings'=>function($q) use ($emps) {
                $q->whereNull("deleted_at");
                if(count($emps)>0) {
                    $q->whereIn("created_by",$emps);
                }
            }])->having("meetings_count",">",0)->orderBy("meetings_count","desc")->take(5)->get();

            //top 5 employees
            $employees = Employee::hidden()->withCount(['meetings'=>function($q) use ($emps) {
                $q->whereNull("deleted_at");
                if(count($emps)>0) {
                    $q->whereIn("created_by",$emps);
                }
            }])->having("meetings_count",">",0)->orderBy("meetings_count","desc")->take(5)->get();

            if (count($emps)>0) {
                $contacts->whereIn("created_by",$emps);
                $follow_today->whereIn("created_by",$emps);
                $calls_in_today->whereIn("created_by",$emps);
                $calls_out_today->whereIn("created_by",$emps);
                $calls_in_month->whereIn("created_by",$emps);
                $calls_out_month->whereIn("created_by",$emps);
                $meetings_in_today->whereIn("created_by",$emps);
                $meetings_out_today->whereIn("created_by",$emps);
                $meetings_in_month->whereIn("created_by",$emps);
                $meetings_out_month->whereIn("created_by",$emps);
            }

            $todayReminders = ReorderReminder::whereDate('reminder_date',Carbon::today())->count();

            $monthReminders = ReorderReminder::whereYear('reminder_date', Carbon::now()->year)
            ->whereMonth('reminder_date', Carbon::now()->month)
            ->count();

            $mostSalesEmployees = Employee::hidden()->whereHas('invoices')
            ->with('branch')
            ->withSum('invoices', 'total_amount')
            ->orderBy('invoices_sum_total_amount', 'desc')
            ->limit(10)
            ->get();

            $mostSalesBranches = Branch::join('employees', 'branches.id', '=', 'employees.branch_id')
            ->join('invoices', 'employees.id', '=', 'invoices.created_by')
            ->select('branches.*')
            ->selectRaw('SUM(invoices.total_amount) as total_sales')
            ->groupBy('branches.id','branches.created_at','branches.updated_at','branches.deleted_at','branches.name')
            ->orderByDesc('total_sales')
            ->get();
            foreach($mostSalesEmployees as $mostSalesEmployee)
            {
                $uniqueCustomerCount = \App\Models\Invoice::where('created_by', $mostSalesEmployee->id)->distinct('customer_id')->count();
                $mostSalesEmployee['uniqueCustomerCount'] = $uniqueCustomerCount;
            }

            $customers          = Customer::count();
            $contacts_count     = $contacts->count();
            $follow_today_count = $follow_today->count();
            $calls_in_today     = $calls_in_today->count();
            $calls_out_today    = $calls_out_today->count();
            $calls_in_month     = $calls_in_month->count();
            $calls_out_month    = $calls_out_month->count();
            $meetings_in_today  = $meetings_in_today->count();
            $meetings_out_today = $meetings_out_today->count();
            $meetings_in_month  = $meetings_in_month->count();
            $meetings_out_month = $meetings_out_month->count();

            $data[] = [
                'user'               => $user,
                'contacts_count'     => $contacts_count,
                'follow_today_count' => $follow_today_count,
                'calls_in_today'     => $calls_in_today,
                'calls_out_today'    => $calls_out_today,
                'calls_in_month'     => $calls_in_month,
                'calls_out_month'    => $calls_out_month,
                'meetings_in_today'  => $meetings_in_today,
                'meetings_out_today' => $meetings_out_today,
                'meetings_in_month'  => $meetings_in_month,
                'meetings_out_month' => $meetings_out_month,
                'sources'            => $sources,
                'interests'          => $interests,
                'cities'             => $cities,
                'areas'              => $areas,
                'employees'          => $employees,
                'target'             => $target,
                'did_amount'         => $did_amount,
                'did_meetings'       => $did_meetings,
                'todayReminders'     => $todayReminders,
                'monthReminders'     => $monthReminders,
                'customers'          => $customers,
                'mostSalesEmployees' => $mostSalesEmployees,
                'mostSalesBranches'  => $mostSalesBranches,
            ];

            return $this->apiResponse($data, 'The Data Returns Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function branches()
    {
        try {

            $data = Branch::with('employees','customers')->get();

            return $this->apiResponse($data, 'The Data Returns Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
