<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;

class CustomerImport implements ToCollection
{
    private $columnMappings;
    private $contactSourceId;
    private $activityId;
    private $interestId;

	private $rowsSaved   = 0;
    private $rowsSkipped = 0;

    public function __construct($columnMappings,$contactSourceId,$activityId,$interestId)
    {
        $this->columnMappings  = $columnMappings;
        $this->contactSourceId = $contactSourceId;
        $this->activityId      = $activityId;
        $this->interestId      = $interestId;
    }



    public function collection(Collection $rows)
    {
        $skipFirstRow = true;
		$k = 0;
		$all_array = [];
        foreach ($rows->toArray() as $row)
        {
            $contactData          = [];
            $contactData["notes"] = "";
            if ($skipFirstRow)
            {
                $skipFirstRow = false;
                continue;
            }
            $i = 0;

            // Iterate through the column mappings
            foreach ($this->columnMappings as $excelColumn => $mapping)
            {
                $contactField = $mapping["contact_field"];

                // Get the value from the Excel column
                $excelValue = $row[$i];

                // Apply your import logic here based on the operator and mapping
                if (!empty($contactField))
                {
                    // Handle non-empty contact fields
                    // Check if the contactField corresponds to a model
                    if ($this->isModelField($contactField))
                    {
                        // Get the model class name (e.g., ContactSource for contact_source_id)
                        $modelClassName = $this->getModelClassName($contactField);

                        // Create or retrieve the model record
                        $modelInstance = $this->createOrRetrieveModel($modelClassName, $excelValue);

                        // Assign the model's ID to the contact data
                        if ($modelInstance)
                        {
                            $contactData[$contactField] = $modelInstance->id;
                        }
                    }
                    else
                    {
                        // Handle other contact fields with equal operator
                        if($contactField =="notes")
                        {
                            $contactData[$contactField] .= " <br /> - <b>".$excelColumn." :</b> ".$excelValue;
                        }
                        else
                        {
                            $contactData[$contactField] = $excelValue;
                        }
                    }
                }
                else
                {
                    // Handle empty contact fields (if required)
                }
                $i++;
            }

            // Validate the data errors
            /*
            $validator = Validator::make($contactData, [
                'name'          => 'required|string',
                'address'       => 'nullable|string',
                'religion'      => 'nullable|in:muslim,christian,other',
                'marital_satus' => 'nullable|in:Single,Married,Absolute,Widower,Other',
                'email'         => 'nullable',
                'mobile'        => 'required',
                'mobile'        => 'required|numeric|unique:customers,mobile,NULL,id,deleted_at,NULL',
                'national_id'   => 'nullable|numeric|unique:customers,national_id,NULL,id,deleted_at,NULL',
            ]);
            if ($validator->fails())
            {
                session()->flash('error');
                return redirect()->back()->withErrors($validator)->withInput();
            }
            */

            // Create or update the contact record based on your logic
            if ( !empty( $contactData ) &&  $contactData['name'] != null && $contactData['mobile'] != null  )
            {
                $contactData['contact_source_id'] = $this->contactSourceId;
                $contactData['activity_id']       = $this->activityId;
                $contactData['interest_id']       = $this->interestId;
                $contactData['created_by']        = auth()->user()->context_id;

				$customer = Customer::where('mobile',$contactData['mobile'])->first();
				if(!$customer)
                {
                    $data = Customer::create($contactData);
                    //create code
                    $data->update(['code' => $this->createCode($data)]);
                    
                    /*
                    //create invoice
                    $randomNumber = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
                    Invoice::create([
                        'invoice_number' => $randomNumber,
                        'invoice_date'   => Carbon::now()->format('Y-m-d'),
                        'total_amount'   => 0,
                        'amount_paid'    => 0,
                        'debt'           => 0,
                        'description'    => "",
                        'status'         => 'paid',
                        'customer_id'    => $customer->id,
                        'activity_id'    => $this->activityId,
                        'interest_id'    => $this->interestId,
                        'created_by'     => auth()->user()->context_id,
                    ]);
                    */

					$this->rowsSaved++;
				}
                else
                {
                    $this->rowsSkipped++;
				}
            }
        }
    }



	public function getRowsSavedCount()
    {
        return $this->rowsSaved;
    }



    public function getRowsSkippedCount()
    {
        return $this->rowsSkipped;
    }



    private function isModelField($field)
    {
        // List the contact fields that correspond to models
        $modelFields = [
            'contact_source_id',
            'city_id',
            'area_id',
            'job_title_id',
            'industry_id',
            'major_id',
            'branch_id',
        ];

        return in_array($field, $modelFields);
    }



    private function getModelClassName($field)
    {
        $models = [
            'contact_source_id' => "ContactSource",
            'city_id'           => "City",
            'area_id'           => "Area",
            'job_title_id'      => "JobTitle",
            'industry_id'       => "Industry",
            'major_id'          => "Major",
            'branch_id'         => "Branch",
        ];
        return $models[$field];
    }



    private function createOrRetrieveModel($modelClassName, $excelValue)
    {
        // Create or retrieve the model instance based on the name field
        $modelClassName = "App\Models\\".$modelClassName;
        return  $modelClassName::firstOrCreate(['name' => trim($excelValue)]);
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
}
