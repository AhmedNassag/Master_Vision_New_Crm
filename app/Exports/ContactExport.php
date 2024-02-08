<?php

namespace App\Exports;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactExport implements FromCollection
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }



    public function collection()
    {
        $contacts = Contact::
        when($this->request->name != null,function ($q) {
            return $q->where('name','like', '%'.$this->request->name.'%');
        })
        ->when($this->request->mobile != null,function ($q) {
            return $q->where('mobile','like', '%'.$this->request->mobile.'%');
        })
        ->when($this->request->mobile2 != null,function ($q) {
            return $q->where('mobile2','like', '%'.$this->request->mobile2.'%');
        })
        ->when($this->request->gender != null,function ($q) {
            return $q->where('gender','like', '%'.$this->request->gender.'%');
        })
        ->when($this->request->national_id != null,function ($q) {
            return $q->where('national_id','like', '%'.$this->request->national_id.'%');
        })
        ->when($this->request->email != null,function ($q) {
            return $q->where('email','like', '%'.$this->request->email.'%');
        })
        ->when($this->request->company_name != null,function ($q) {
            return $q->where('company_name','like', '%'.$this->request->company_name.'%');
        })
        ->when($this->request->campaign_id != null,function ($q) {
            return $q->where('campaign_id','like', '%'.$this->request->campaign_id.'%');
        })
        ->when($this->request->city_id != null,function ($q) {
            return $q->where('city_id','like', '%'.$this->request->city_id.'%');
        })
        ->when($this->request->area_id != null,function ($q) {
            return $q->where('area_id','like', '%'.$this->request->area_id.'%');
        })
        ->when($this->request->employee_id != null,function ($q) {
            return $q->where('employee_id','like', '%'.$this->request->employee_id.'%');
        })
        ->when($this->request->industry_id != null,function ($q) {
            return $q->where('industry_id','like', '%'.$this->request->industry_id.'%');
        })
        ->when($this->request->major_id != null,function ($q) {
            return $q->where('major_id','like', '%'.$this->request->major_id.'%');
        })
        ->when($this->request->job_title_id != null,function ($q) {
            return $q->where('job_title_id','like', '%'.$this->request->job_title_id.'%');
        })
        ->when($this->request->activity_id != null,function ($q) {
            return $q->where('activity_id','like', '%'.$this->request->activity_id.'%');
        })
        ->when($this->request->interest_id != null,function ($q) {
            return $q->where('interest_id','like', '%'.$this->request->interest_id.'%');
        })
        ->when($this->request->status != null,function ($q) {
            return $q->where('status',$this->request->status);
        })
        ->when($this->request->from_date != null,function ($q) {
            return $q->whereDate('created_at', '>=', $this->request->from_date);
        })
        ->when($this->request->to_date != null,function ($q) {
            return $q->whereDate('created_at', '<=', $this->request->to_date);
        })->get();

        return $contacts;
    }
}
