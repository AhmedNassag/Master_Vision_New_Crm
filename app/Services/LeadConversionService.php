<?php
namespace App\Services;

use App\Models\Lead;
use App\Models\Point;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Customer;
use App\DTOs\LeadHistoryData;
use App\Models\ReorderReminder;
use Illuminate\Support\Facades\Http;
use App\Constants\LeadHistory\Actions;
use App\Services\PointAdditionService;

class LeadConversionService
{
    public function transitionToContacted(Contact $lead)
    {
        $oldStatus    = $lead->status;
        $lead->status = 'contacted';
        $lead->save();
        $data               = new LeadHistoryData($lead->id, Actions::STATUES_CHANGED, $lead->id, ['from'=>$oldStatus,'to'=>$lead->status], auth()->user()->context_id);
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
            $data               = new LeadHistoryData($lead->id, Actions::RESTORED, $lead->id,[], auth()->user()->context_id);
            $leadHistoryService = new LeadHistoryService();
            $leadHistoryService->logAction($data);
        }else{
            $lead->is_trashed = 1;
            $lead->save();
            $data               = new LeadHistoryData($lead->id, Actions::TRASHED, $lead->id,[], auth()->user()->context_id);
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
        $data               = new LeadHistoryData($lead->id, Actions::STATUES_CHANGED, $lead->id, ['from'=>$oldStatus,'to'=>$lead->status], auth()->user()->context_id);
        $leadHistoryService = new LeadHistoryService();
        $leadHistoryService->logAction($data);
        return $lead;
    }



    public function convertToCustomer(Contact $lead,$invoice,$next_reorder_reminder = null, $email = null, $package_id = null, $package_name = null, $program_name = null)
    {
        $oldStatus = $lead->status;

        $customer  = Customer::where('mobile',$lead->mobile)->orWhere(function($query) use ($lead){
            return $query->whereNotNull('national_id')->where('national_id',$lead->national_id);
        })->first();


        if(!$customer)
        {
            /*if(!$lead->customer_id)
            {*/
                $employee  = auth()->user()->employee;
                $branch_id = null;
                if($employee)
                {
                    $branch_id = $employee->branch_id;
                }
                $customer = Customer::create([
                    'name'                => $lead->name ?? null,
                    'mobile'              => $lead->mobile ?? null,
                    'mobile2'             => $lead->mobile2 ?? null,
                    'whats_app_mobile'    => $lead->whats_app_mobile ?? null,
                    'gender'              => $lead->gender ?? null,
                    'email'               => @$email != null ? $email : $lead->email,
                    'birth_date'          => $lead->birth_date ?? null,
                    'national_id'         => $lead->national_id ?? null,
                    'contact_source_id'   => $lead->contact_source_id ?? null,
                    'city_id'             => $lead->city_id ?? null,
                    'area_id'             => $lead->area_id ?? null,
                    'job_title_id'        => $lead->job_title_id ?? null,
                    'industry_id'         => $lead->industry_id ?? null,
                    'major_id'            => $lead->major_id ?? null,
                    'company_name'        => $lead->company_name ?? null,
                    'notes'               => $lead->code ?? null,
                    'contact_category_id' => $lead->contact_category_id,
                    'activity_id'         => $invoice['activity_id'],
                    'interest_id'         => $invoice['interest_id'],
                    'address'             => $lead->address,
                    'religion'            => $lead->religion,
                    'marital_status'      => $lead->marital_status,
                    'custom_attributes'   => $lead->custom_attributes ?? null,
                    'custom_attributes'   => array_merge(
                        (array) $lead->custom_attributes, [
                            'package_name' => $package_name ?? null,
                            'program_name' => $program_name ?? null,
                            'other_notes'  => $invoice['description'] ?? null,
                        ]
                    ),
                    'created_by'          => auth()->user()->context_id ?? null,
                    'branch_id'           => $branch_id ?? null,
                ]);
                //create code
                $customer->update(['code' => $this->createCode($customer)]);
            /*}
            else
            {
                $customer = Customer::find($lead->customer_id);
            }*/
        }

        $invoice['customer_id'] = $customer->id;
        $invoice['created_by']  = auth()->user()->context_id;
        $invoiceRecord          = Invoice::create($invoice);
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
        $data               = new LeadHistoryData($lead->id, Actions::STATUES_CHANGED, $lead->id, ['from'=>$oldStatus,'to'=>$lead->status], auth()->user()->context_id);
        $leadHistoryService = new LeadHistoryService();
        $leadHistoryService->logAction($data);

        $customerData                      = [];
        $customerData['customer']          = $customer;
        $customerData['custom_attributes'] = $lead->custom_attributes;

        //send api to national application to create a new user
        if(request()->root() == 'http://new-crm.com' || request()->root() == 'http://new-crm.com/public' || request()->root() == 'https://dev.ourcrm.app' || request()->root() == 'https://dev.ourcrm.app/public' || request()->root() == 'https://nationalegypt.ourcrm.app' || request()->root() == 'https://nationalegypt.ourcrm.app/public')
        {
            $point = Point::create([
                'customer_id'     => $customer->id,
                'activity_id'     => $customer->activity_id ?? null,
                'sub_activity_id' => $customer->interest_id ?? null,
                'points'          => 500,
                'expiry_date'     => now()->addYear(),
            ]);
            $response = Http::timeout(60)->post('https://nbenewcopy.nationalegypt.com/api/userData', [
                'id'                  => $customer->id,
                'name'                => $customer->name ?? null,
                'mobile'              => $customer->mobile ?? null,
                'email'               => $customer->email ?? null,
                'mobile2'             => $customer->mobile2 ?? null,
                'custom_attributes'   => $lead->custom_attributes ?? null,
                'whats_app_mobile'    => $customer->whats_app_mobile ?? null,
                'gender'              => $customer->gender ?? null,
                'birth_date'          => $customer->birth_date ?? null,
                'national_id'         => $customer->national_id ?? null,
                'contact_source_id'   => $customer->contact_source_id ? $customer->customerSource->name : null,
                'city_id'             => $customer->city_id ? $customer->city->name : null,
                'area_id'             => $customer->area_id ? $customer->area->name : null,
                'job_title_id'        => $customer->job_title_id ? $customer->jobTitle->name : null,
                'industry_id'         => $customer->industry_id ? $customer->industry->name : null,
                'major_id'            => $customer->major_id ? $customer->major->name : null,
                'company_name'        => $customer->company_name ?? null,
                'notes'               => $invoice['description'] ?? null,
                'contact_category_id' => $customer->contact_category_id ? $customer->contactCategory->name : null,
                'activity_id'         => $customer->activity_id ? $customer->activity->name : null,
                'interest_id'         => $customer->interest_id ? $customer->subActivity->name : null,
                'address'             => $customer->address,
                'religion'            => $customer->religion,
                'marital_status'      => $customer->marital_status,
                'created_by'          => auth()->user()->context_id ? auth()->user()->name : null,
                'package_id'          => $package_id ?? null,
            ]);
        }
        return $lead;
    }



    public function createCode($customer)
    {
        // Retrieve the branch code from the branch
        $branchCode = $customer->branch && $customer->branch->code != null  ? $customer->branch->code  : '00';

        // Get the current year
        $currentYear = date('y');

        // Generate a serial number
        $latestCustomer = Customer::where('code', 'Like', "{$branchCode}/{$currentYear}/%")
            ->orderBy('id', 'desc')
            ->first();

        $serialNumber = 000001; // Default serial number
        if ($latestCustomer) {
            // Extract the last serial number and increment it
            $lastCode = $latestCustomer->code;
            $lastSerialNumber = (int)substr($lastCode, strrpos($lastCode, '/') + 1);
            $serialNumber = $lastSerialNumber + 1;
        }

        // Format the serial number to be at least 3 digits
        $formattedSerialNumber = str_pad($serialNumber, 6, '0', STR_PAD_LEFT);

        // Construct the new code
        $newCode = "{$branchCode}/{$currentYear}/{$formattedSerialNumber}";

        return $newCode;
    }

    public function transitionToArchived(Contact $lead)
    {
        $oldStatus    = $lead->status;
        $lead->status = 'archived';
        $lead->save();
        $data               = new LeadHistoryData($lead->id, Actions::STATUES_CHANGED, $lead->id, ['from'=>$oldStatus,'to'=>$lead->status], auth()->user()->context_id);
        $leadHistoryService = new LeadHistoryService();
        $leadHistoryService->logAction($data);

        return $lead;
    }
}
