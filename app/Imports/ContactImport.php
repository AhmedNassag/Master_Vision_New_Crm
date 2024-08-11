<?php

namespace App\Imports;

use App\Models\Contact;
use App\Models\ContactCompletion;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;

class ContactImport implements ToCollection
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
                'email'         => 'nullable',
                'religion'      => 'nullable|in:muslim,christian,other',
                'marital_satus' => 'nullable|in:Single,Married,Absolute,Widower,Other',
                'mobile'        => 'required|unique:contacts,mobile,NULL,id,deleted_at,NULL',
                'national_id'   => 'nullable|unique:contacts,national_id,NULL,id,deleted_at,NULL',
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

				if(auth()->user()->roles_name[0] != 'Admin' && auth()->user()->employee->has_branch_access !=1)
                {
                    $contactData['employee_id'] = auth()->user()->context_id;
				}

                $contactData['created_by'] = auth()->user()->context_id;

				$contact = Contact::where('mobile',$contactData['mobile'])->first();
				if(!$contact)
                {
                    $data = Contact::create($contactData);
                    
                    //create code
                    $data->update(['code' => $this->createCode($data)]);
                    
                    //create in completion
                    $this->completionData($contactData, $data->id);
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



    public function completionData($inputs, $id)
    {
        //delete old records
        $oldContactCompletions = ContactCompletion::where('contact_id',$id)->get();
        if($oldContactCompletions->count() > 0)
        {
            foreach($oldContactCompletions as $oldContactCompletion)
            {
                $oldContactCompletion->delete();
            }
        }
        foreach($inputs as $key=>$input)
        {
            //insert new records
            if($key != "_token" && $key != "_method" && $key != "id" && $key != "created_by" && $input != null)
            {
                $contactCompletion = ContactCompletion::create([
                    'contact_id'    => $id,
                    'completed_by'  => Auth::user()->id,
                    'property_name' => $key,
                ]);
            }
        }
    }
    

    
    public function createCode($contact)
    {
        // Retrieve the branch code from the branch
        $branchCode = $contact->branch && $contact->branch->code != null  ? $contact->branch->code  : '00';

        // Get the current year
        $currentYear = date('y');

        // Generate a serial number
        $latestContact = Contact::where('code', 'Like', "{$branchCode}/{$currentYear}/%")
            ->orderBy('id', 'desc')
            ->first();

        $serialNumber = 000001; // Default serial number
        if ($latestContact) {
            // Extract the last serial number and increment it
            $lastCode = $latestContact->code;
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
