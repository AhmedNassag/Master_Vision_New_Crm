<?php
namespace App\Services;

use App\Models\Lead;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Customer;
use App\DTOs\LeadHistoryData;
use App\Models\ReorderReminder;
use App\Constants\LeadHistory\Actions;
use App\Services\PointAdditionService;

class ApiLeadConversionService
{
    public function transitionToContacted(Contact $lead)
    {
        $oldStatus    = $lead->status;
        $lead->status = 'contacted';
        $lead->save();
        $data               = new LeadHistoryData($lead->id, Actions::STATUES_CHANGED, $lead->id, ['from'=>$oldStatus,'to'=>$lead->status], auth()->guard('api')->user()->context_id);
        $leadHistoryService = new LeadHistoryService();
        $leadHistoryService->logAction($data);

        return $lead;
    }



    public function toTrash(Contact $lead)
    {
        if($lead->is_trashed == 1)
        {
            $lead->is_trashed = 0;
            $lead->save();
            $data               = new LeadHistoryData($lead->id, Actions::RESTORED, $lead->id,[], auth()->guard('api')->user()->context_id);
            $leadHistoryService = new LeadHistoryService();
            $leadHistoryService->logAction($data);
        }else{
            $lead->is_trashed = 1;
            $lead->save();
            $data               = new LeadHistoryData($lead->id, Actions::TRASHED, $lead->id,[], auth()->guard('api')->user()->context_id);
            $leadHistoryService = new LeadHistoryService();
            $leadHistoryService->logAction($data);
        }


        return $lead;
    }

    public function transitionToQualified(Contact $lead)
    {
        $oldStatus    = $lead->status;
        $lead->status = 'qualified';
        $lead->save();
        $data               = new LeadHistoryData($lead->id, Actions::STATUES_CHANGED, $lead->id, ['from'=>$oldStatus,'to'=>$lead->status], auth()->guard('api')->user()->context_id);
        $leadHistoryService = new LeadHistoryService();
        $leadHistoryService->logAction($data);
        return $lead;
    }



    public function convertToCustomer(Contact $lead,$invoice,$next_reorder_reminder = null)
    {
        $oldStatus = $lead->status;
        $customer  = Customer::where('mobile',$lead->mobile)->orWhere(function($query) use ($lead){
            return $query->whereNotNull('national_id')->where('national_id',$lead->national_id);
        })->first();

        if(!$customer)
        {
            if(!$lead->customer_id)
            {
                $employee  = auth()->guard('api')->user()->employee;
                $branch_id = null;
                if($employee)
                {
                    $branch_id = $employee->branch_id;
                }
                $customer = Customer::create([
                    'name'              => $lead->name,
                    'mobile'            => $lead->mobile,
                    'gender'            => $lead->gender,
                    'email'             => $lead->email,
                    'birth_date'        => $lead->birth_date,
                    'national_id'       => $lead->national_id,
                    'contact_source_id' => $lead->contact_source_id,
                    'city_id'           => $lead->city_id,
                    'area_id'           => $lead->area_id,
                    'job_title_id'      => $lead->job_title_id,
                    'industry_id'       => $lead->industry_id,
                    'major_id'          => $lead->major_id,
                    'created_by'        => $lead->created_by,
                    'mobile2'           => $lead->mobile2,
                    'whats_app_mobile'  => $lead->whats_app_mobile,
                    'company_name'      => $lead->company_name,
                    'notes'             => $lead->notes,
                    'branch_id'         =>$branch_id,
                ]);
            }
            else
            {
                $customer = Customer::find($lead->customer_id);
            }
        }
        // $invoice['customer_id'] = $customer->id;
        // $invoice['created_by']  = auth()->guard('api')->user()->context_id;
        $customer_id = $customer->id;
        $created_by  = auth()->guard('api')->user()->context_id;
        foreach ($invoice as &$inv) {
            $inv['customer_id'] = $customer_id;
            $inv['created_by']  = $created_by;
        /*
        }
        */
        $invoiceRecord          = Invoice::create($inv);
        $addPointsService       = new PointAdditionService();
        $addPointsService->addPoints($invoiceRecord->customer_id,$invoiceRecord->activity_id,$invoiceRecord->interest_id,$invoiceRecord->amount_paid);
        if($next_reorder_reminder)
        {
            ReorderReminder::create([
                "customer_id"   => $invoiceRecord->customer_id,
                "invoice_id"    => $invoiceRecord->id,
                "reminder_date" => $next_reorder_reminder,
            ]);
        }
        $lead->customer_id = $customer->id;
        $lead->status = 'converted';
        $lead->save();
        $data               = new LeadHistoryData($lead->id, Actions::STATUES_CHANGED, $lead->id, ['from'=>$oldStatus,'to'=>$lead->status], auth()->guard('api')->user()->context_id);
        $leadHistoryService = new LeadHistoryService();
        $leadHistoryService->logAction($data);
        }
        return $lead;
    }
}
