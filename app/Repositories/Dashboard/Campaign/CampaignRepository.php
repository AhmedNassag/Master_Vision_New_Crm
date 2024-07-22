<?php

namespace App\Repositories\Dashboard\Campaign;

use App\Models\Contact;
use App\Models\Activity;
use App\Models\Campaign;
use App\Models\Customer;
use App\Models\SubActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Dashboard\BaseRepository;

class CampaignRepository extends BaseRepository implements CampaignInterface
{
    public function getModel()
    {
        return new Campaign();
    }



    public function index($request)
    {
        $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

        $data = Campaign::with(['activity','subActivity','contactSource'])
        ->when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->url != null,function ($q) use($request){
            return $q->where('url','like', '%'.$request->url.'%');
        })
        ->when($request->activity_id != null,function ($q) use($request){
            return $q->where('activity_id', $request->activity_id);
        })
        ->when($request->interest_id != null,function ($q) use($request){
            return $q->where('interest_id', $request->interest_id);
        })
        ->when($request->contact_source_id != null,function ($q) use($request){
            return $q->where('contact_source_id', $request->contact_source_id);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate($perPage)->appends(request()->query());

        return view('dashboard.campaign.index',compact('data'))
        ->with([
            'name'              => $request->name,
            'url'               => $request->url,
            'activity_id'       => $request->activity_id,
            'interest_id'       => $request->interest_id,
            'contact_source_id' => $request->contact_source_id,
            'from_date'         => $request->from_date,
            'to_date'           => $request->to_date,
            'perPage'           => $perPage,
        ]);
    }



    public function reTarget()
    {
        return view('dashboard.reTarget.index');
    }



    public function getReTarget($request)
    {
        $from        = $request->from_date;
		$to          = $request->to_date;
		$activity_id = $request->activity_id;
        $interest_id = $request->interest_id;
        if(Auth::user()->roles_name[0] == "Admin")
        {
            $data = Customer::
            whereHas('invoices', function ($query) use ($from, $to, $activity_id,$interest_id) {
                return $query->where('activity_id', $activity_id)
                    ->when(($from && $to),function($query) use($from, $to){
                        $query->whereBetween('invoice_date', [$from, $to]);
                    });
            })
            ->orderBy('id', 'desc')
            ->get();
        }
        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
        {
            $data = Customer::
            whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
            ->orWhere('created_by', auth()->user()->employee->id)
            ->whereHas('invoices', function ($query) use ($from, $to, $activity_id,$interest_id) {
                return $query->where('activity_id', $activity_id)
                    ->when(($from && $to),function($query) use($from, $to){
                        $query->whereBetween('invoice_date', [$from, $to]);
                    });
            })
            ->orderBy('id', 'desc')
            ->get();
        }
        else
        {
            $data = Customer::
            where('created_by', auth()->user()->employee->id)
            ->whereHas('invoices', function ($query) use ($from, $to, $activity_id,$interest_id) {
                return $query->where('activity_id', $activity_id)
                    ->when(($from && $to),function($query) use($from, $to){
                        $query->whereBetween('invoice_date', [$from, $to]);
                    });
            })
            ->orderBy('id', 'desc')
            ->get();
        }

        return view('dashboard.reTarget.index',compact('data'))
        ->with([
            'activity_id' => $request->activity_id,
            'interest_id' => $request->interest_id,
            'from_date'   => $request->from_date,
            'to_date'     => $request->to_date,
        ]);
    }



    public function reTargetSelected($request)
    {
        try {
            $old_activity     = Activity::find($request->old_activity_id);
            $new_activity     = Activity::find($request->retarget_activity_id);
            $new_sub_activity = SubActivity::find($request->retarget_interest_id);
            $name             = "إعادة استهداف ({$old_activity->name} إلي {$new_activity->name}) (فرعي: {$new_sub_activity->name}) ";
            //Create Compaign
            $campaign_id = request()->campaign_id;
            if($campaign_id)
            {
                $campaign = Campaign::find($campaign_id);
                $name     = "تم اضافته الي حملة الاستهداف ". "( $campaign )". "بنجاح";
            }
            else
            {
                $campaign  = Campaign::create([
                    'name' => $name
                ]);
            }

            //Create lead accounts
            $reTarget_selected_id = explode(",", $request->reTarget_selected_id);
            $customers            = Customer::whereIn('id', $reTarget_selected_id)->get();
            foreach ($customers as $customer)
            {
                $contact = Contact::create([
                    'name'                => $customer->name ?? null,
                    'mobile'              => $customer->mobile ?? null,
                    'mobile2'             => $customer->mobile2 ?? null,
                    'email'               => $customer->email ?? null,
                    'company_name'        => $customer->company_name ?? null,
                    'notes'               => $customer->notes ?? null,
                    'gender'              => $customer->gender ?? null,
                    'birth_date'          => $customer->birth_date ?? null,
                    'national_id'         => $customer->national_id ?? null,
                    'city_id'             => $customer->city_id ?? null,
                    'area_id'             => $customer->area_id ?? null,
                    'contact_source_id'   => $customer->contact_source_id ?? null,
                    'contact_category_id' => $customer->contact_category_id ?? null,
                    'job_title_id'        => $customer->job_title_id ?? null,
                    'industry_id'         => $customer->industry_id ?? null,
                    'major_id'            => $customer->major_id ?? null,
                    'activity_id'         => $customer->activity_id ?? null,
                    'branch_id'           => $customer->branch_id ?? null,
                    'created_by'          => $customer->created_by ?? null,
                    'code'                => $customer->code ?? null,
                    'address'             => $customer->address ?? null,
                    'religion'            => $customer->religion ?? null,
                    'interest_id'         => $customer->interest_id ?? null,
                    'customer_id'         => $customer->id ?? null,
                    'campaign_id'         => $campaign->id ?? null,
                ]);

                if (!$contact) {
                    session()->flash('error');
                    return redirect()->back();
                }
            }

            session()->flash('success');
            return redirect()->route('reTarget.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
