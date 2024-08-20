<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Area;
use App\Models\City;
use App\Models\Branch;
use App\Models\Contact;
use App\Models\Meeting;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\MeetingNote;
use App\Models\SubActivity;
use Illuminate\Http\Request;
use App\Models\ContactSource;
use App\Models\EmployeeTarget;
use App\Models\ReorderReminder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('checkExpirationDate');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {

            $user         = Auth::user();
            $target       = EmployeeTarget::where("employee_id",$user->context_id)->where("month",date("Y-m"))->first();
            $did_amount   = Meeting::where("created_by",$user->context_id)->sum("revenue");
            $did_meetings = Meeting::where("created_by",$user->context_id)->count();
            $emps = [];
            foreach($user->roles as $role) {
                if ($role->name = "admin") {
                    $emps = Employee::pluck('id')->toArray();
                }
                else {
                    $emps = Employee::where("dept", Auth::user()->employee->dept)->pluck('id')->toArray();
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

            $todayFollowUps = MeetingNote::whereDate('follow_date',Carbon::today())->count();

            $monthFollowUps = MeetingNote::whereYear('follow_date', Carbon::now()->year)
                ->whereMonth('follow_date', Carbon::now()->month)
                ->count();

            $todayBirthdays = Customer::whereMonth('birth_date', Carbon::today()->month)->whereDay('birth_date', Carbon::today()->day)->count();

            $mostSalesEmployees = Employee::hidden()->whereHas('invoices')
                ->withSum('invoices', 'total_amount')
                ->orderBy('invoices_sum_total_amount', 'desc')
                ->limit(10)
                ->get();

            $mostSalesBranches = Branch::join('employees', 'branches.id', '=', 'employees.branch_id')
                ->join('invoices', 'employees.id', '=', 'invoices.created_by')
                ->select('branches.*')
                ->selectRaw('SUM(invoices.total_amount) as total_sales')
                ->groupBy('branches.id','branches.created_at','branches.updated_at','branches.deleted_at','branches.name','branches.code')
                ->orderByDesc('total_sales')
                ->get();

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

            return view('home', compact(
                'contacts_count',
                'follow_today_count',
                'calls_in_today',
                'calls_out_today',
                'calls_in_month',
                'calls_out_month',
                'meetings_in_today',
                'meetings_out_today',
                'meetings_in_month',
                'meetings_out_month',
                'sources',
                'interests',
                'cities',
                'areas',
                'employees',
                'target',
                'did_amount',
                'did_meetings',
                'todayReminders',
                'monthReminders',
                'todayFollowUps',
                'monthFollowUps',
                'todayBirthdays',
                'customers',
                'mostSalesEmployees',
                'mostSalesBranches'
            ));

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
