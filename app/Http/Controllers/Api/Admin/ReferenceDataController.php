<?php

namespace App\Http\Controllers\Api\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;

class ReferenceDataController extends Controller
{
    use ApiResponseTrait;



    public function getBranches()
    {
        $data = \App\Models\Branch::with('employees','customers')->get();

        return $this->apiResponse($data, 'The Data Returns Successfully', 200);
    }



    public function referenceData()
    {
        //ticket_status
        $ticket_status = ['Pending','Open','In-Progress','Resolved'];


        //gender
        $gender = ['Male','Female'];


        //contact_call_type
        $contact_call_type = ['Call','Meeting'];


        //contact_status
        $contact_status =['Contacted','Qualified','Converted'];


        //contact_status_invoice
        $contact_status_invoice = ['Draft','Sent','Paid','Void'];


        //contact_meeting_place
        $contact_meeting_place = ['Incoming','Outcoming'];


        //month
        $month_format = 'M-Y';
        $year_month   = [];
        $currentYear  = date('Y');
        $date = \Carbon\Carbon::create($currentYear, 1, 1);
        for ($i = 1; $i <= date('n'); $i++)
        {
            $year_month[$date->format('Y-m')] = $date->format($month_format);
            $date->addMonth();
        }
        $month = $year_month;


        //employee_id
        if(auth()->guard('api')->user()->roles_name[0] == "Admin")
        {
            $employee_id = \App\Models\Employee::get(['id','name']);
        }
        else
        {
            $employee_id = \App\Models\Employee::where('branch_id', auth()->guard('api')->user()->employee->branch_id)->get(['id','name']);
        }



        //contact_id
        if(auth()->guard('api')->user()->roles_name[0] == "Admin")
        {
            $contact_id = \App\Models\Contact::get(['id','name']);
        }
        else if(auth()->guard('api')->user()->roles_name[0] != "Admin" && auth()->guard('api')->user()->employee->has_branch_access == 1)
        {
            $contact_id = \App\Models\Contact::whereRelation('createdBy','branch_id', auth()->guard('api')->user()->employee->branch_id)->get(['id','name']);
        }
        else
        {
            $contact_id = \App\Models\Contact::where('employee_id', auth()->guard('api')->user()->employee->id)->get(['id','name']);
        }


        //branch_id
        if(auth()->guard('api')->user()->roles_name[0] == "Admin")
        {
            $branch_id = \App\Models\Branch::get(['id','name']);
        }
        else
        {
            $branch_id = \App\Models\Branch::where('id', auth()->guard('api')->user()->employee->branch_id)->get(['id','name']);
        }


        //department_id
        $department_id = \App\Models\Department::get(['id','name']);


        //contact_source_id
        $contact_source_id = \App\Models\ContactSource::get(['id','name']);



        //contact_category_id
        $contact_category_id = \App\Models\ContactCategory::get(['id','name']);


        //activity_id
        $activity_id = \App\Models\Activity::get(['id','name']);


        //interest_id
        $interest_id = \App\Models\SubActivity::get(['id','name']);


        //job_title_id
        $job_title_id = \App\Models\JobTitle::get(['id','name']);


        //city_id
        $city_id = \App\Models\City::get(['id','name']);



        //area_id
        $area_id = \App\Models\Area::get(['id','name']);


        //industry_id
        $industry_id = \App\Models\Industry::get(['id','name']);


        //major_id
        $major_id = \App\Models\Major::get(['id','name']);


        //reply_id
        $reply_id = \App\Models\SavedReply::get(['id','reply']);


        //campaign_id
        $campaign_id = \App\Models\Campaign::get(['id','name']);


        $data[] = [
            'ticket_status'          => $ticket_status,
            'gender'                 => $gender,
            'contact_call_type'      => $contact_call_type,
            'contact_status'         => $contact_status,
            'contact_status_invoice' => $contact_status_invoice,
            'contact_meeting_place'  => $contact_meeting_place,
            'month'                  => $month,
            'employee_id'            => $employee_id,
            'contact_id'             => $contact_id,
            'branch_id'              => $branch_id,
            'department_id'          => $department_id,
            'contact_source_id'      => $contact_source_id,
            'contact_category_id'    => $contact_category_id,
            'activity_id'            => $activity_id,
            'interest_id'            => $interest_id,
            'job_title_id'           => $job_title_id,
            'city_id'                => $city_id,
            'area_id'                => $area_id,
            'industry_id'            => $industry_id,
            'major_id'               => $major_id,
            'reply_id'               => $reply_id,
            'campaign_id'            => $campaign_id,
        ];

        return $this->apiResponse($data, 'The Data Returned Successfully', 200);
    }
}
