<?php

namespace App\Http\Controllers\Dashboard;

use Validator;
use App\Models\RecorderReminder;
use App\Models\Activity;
use App\Models\SubActivity;
use App\Models\Campaign;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Customer\CustomerInterface;
use App\Http\Requests\Dashboard\Customer\StoreRequest;
use App\Http\Requests\Dashboard\Customer\UpdateRequest;
use App\Services\PointAdditionService;
use App\Imports\CustomersImport;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageTrait;

class CustomerController extends Controller
{
    use ImageTrait;
    protected $customer;

    public function __construct(CustomerInterface $customer)
    {
        $this->customer = $customer;
    }



    public function index(Request $request)
    {
        return $this->customer->index($request);
    }



    public function show($id)
    {
        return $this->customer->show($id);
    }



    public function create()
    {
        return $this->customer->create();
    }



    public function store(StoreRequest $request)
    {
        return $this->customer->store($request);
    }



    public function edit($id)
    {
        return $this->customer->edit($id);
    }



    public function update(UpdateRequest $request)
    {
        return $this->customer->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->customer->destroy($request);
    }



    public function addParent($id)
    {
        return $this->customer->addParent($id);
    }



    public function storeParent(StoreRequest $request)
    {
        return $this->customer->storeParent($request);
    }



    public function addInvoice(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'invoice'                => ['required','array','min:1'],
			'invoice.invoice_number' => 'required|string',
			'invoice.invoice_date'   => 'required|date',
			'invoice.total_amount'   => 'required|numeric',
			'invoice.amount_paid'    => 'required|numeric',
			'invoice.debt'           => 'required|numeric',
			'invoice.description'    => 'required|string',
			'invoice.status'         => 'required|string',
			'invoice.customer_id'    => 'required',
		]);

		if ($validator->fails()) {
            session()->flash('error');
			return redirect()->back()->withErrors($validator)->withInput();
		}
        $dataInvoice               = $request->invoice;
        $dataInvoice['created_by'] = auth()->user()->context_id;
        $invoice                   = Invoice::create($dataInvoice);
        $addPointsService          = new PointAdditionService();
        $addPointsService->addPoints($invoice->customer_id,$invoice->activity_id,$invoice->interest_id,$invoice->amount_paid);
        if($request->next_reorder_reminder)
        {
            ReorderReminder::create([
                "customer_id"   => $invoice->customer_id,
                "invoice_id"    => $invoice->id,
                "reminder_date" => $request->next_reorder_reminder,
            ]);
        }
        session()->flash('success');
		return redirect()->back();
	}



    public function editInvoice($id)
	{
		$invoice = Invoice::find($id);
		if(isset($invoice->id)) {
			return view('dashboard.customer.editInvoice')->with('invoice', $invoice);
        } else {
            return view('404');
        }
	}



    public function updateInvoice(Request $request)
	{
        try {
            $request->validate([
                'invoice_number' => 'required|string',
                'invoice_date'   => 'required|date',
                'total_amount'   => 'required|numeric',
                'amount_paid'    => 'required|numeric',
                'debt'           => 'required|numeric',
                'description'    => 'required|string',
                'status'         => 'required|string',
            ]);

            $inputs  = $request->all();
            $invoice = Invoice::find($request->id);
            $invoice->update($inputs);
            if(!$invoice)
            {
                session()->flash('error');
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->route('customer.show',$invoice->customer_id);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}



    public function addReminder(Request $request)
    {
        $validator = Validator::make($request->all(), [
			'reminder'                 => ['required','array','min:1'],
			'reminder.activity_id'     => 'required',
			'reminder.reminder_date'   => 'required|date',
            'reminder.expected_amount' => 'required',
			'reminder.customer_id'     => 'required',
		]);
		if ($validator->fails())
        {
            session()->flash('error');
			return redirect()->back()->withErrors($validator)->withInput();
		}
        $data             = $request->reminder;
        $recorderReminder = RecorderReminder::create($data);
        if(!$recorderReminder)
        {
            session()->flash('error');
            return redirect()->back();
        }
        session()->flash('success');
        return redirect()->back();
    }



    public function addAttachment(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
			'files'   => 'required|array',
            'files.*' => 'required|file|mimes:png,jpg,jpeg,webp',
		]);
		if ($validator->fails())
        {
            session()->flash('error');
			return redirect()->back()->withErrors($validator)->withInput();
		}
        $data = Customer::find($request->id);
        //upload files
        $i = 1;
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $file_name = time() . $i . '.' . $file->getClientOriginalName();
                $file->storeAs('customer', $file_name, 'attachments');
                $data->files()->create([
                    'file_path' => asset('public/attachments/customer/' . $file_name),
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => $i
                ]);
                $i++;
            }
        }
        if(!$data)
        {
            session()->flash('error');
            return redirect()->back();
        }
        session()->flash('success');
        return redirect()->back();
    }



    public function deleteAttachment($id)
    {
        try {
            $media = Media::findOrFail($id);
            if (!$media) {
                session()->flash('error');
                return redirect()->back();
            }
            Storage::disk('attachments')->delete('customer/' . $media->file_name);
            $media->delete();
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function postRetargetResults(Request $request)
	{
        $validator = Validator::make($request->all(), [
			'new_activity_id' => 'required',
			'new_interest_id' => 'required',
			'campaign_id'     => 'required',
		]);
		if ($validator->fails())
        {
            session()->flash('error');
			return redirect()->back();
		}

        $customer = Customer::find($request->id);
        if(isset($customer->invoices->first()->activity->id))
        {
            $activity_id = $customer->invoices->first()->activity->id;
        }
        else
        {
            $activity_id = $request->new_activity_id;
        }
        $new_interest_id = $request->new_interest_id;
        if (!$request->new_activity_id || !$activity_id || !$request->new_interest_id || !$request->campaign_id)
        {
            session()->flash('error');
            return redirect()->back();
        }
        else
        {
            $inputs = [];
            $inputs['ids']              = $request->id;
            $inputs['new_activity_id']  = $request->new_activity_id;
            $inputs['new_interest_id']  = $request->new_interest_id;
            $inputs['campaign_id']      = $request->campaign_id;
            $inputs['activity_id']      = $activity_id;
        }
		$old_activity     = Activity::find($inputs['activity_id']);
        $new_activity     = Activity::find($inputs['new_activity_id']);
        $new_sub_activity = SubActivity::find($inputs['new_interest_id']);
		$name             = "إعادة استهداف ({$old_activity->name} إلي {$new_activity->name}) (فرعي: {$new_sub_activity->name}) ";
        //Create Compaign
        $campaign_id = $inputs['campaign_id'];
        if($campaign_id)
        {
            $campaign = Campaign::find($campaign_id);
            $name     = "تم اضافته الي حملة الاستهداف ". "( $campaign )". "بنجاح";
        }
        else
        {
            $campaign = Campaign::create([
                'name' => $name
            ]);
        }
		//Create lead accounts
		// foreach ($inputs['ids'] as $id) {
            $id = $inputs['ids'];
            $customer = Customer::find($id);
			$contact  =  Contact::create([
                'name'              => $customer->name,
                'mobile'            => $customer->mobile,
                'gender'            => $customer->gender,
                'email'             => $customer->email,
                'contact_source_id' => $customer->contact_source_id,
                'city_id'           => $customer->city_id,
                'area_id'           => $customer->area_id,
                'job_title_id'      => $customer->job_title_id,
                'industry_id'       => $customer->industry_id,
                'major_id'          => $customer->major_id,
                'created_by'        => $customer->created_by,
                'mobile2'           => $customer->mobile2,
                'company_name'      => $customer->company_name,
                'notes'             => $customer->notes,
				'activity_id'       => $request->new_activity_id,
                'interest_id'       => $request->new_interest_id,
				'campaign_id'       => $campaign->id,
				'customer_id'       => $customer->id,
            ]);
		// }
        session()->flash('success');
        return redirect()->back();
	}



    public function importData(Request $request)
    {
        // Validate the form submission
		$request->validate([
            'contacts_file' => 'required|mimes:xlsx,xls',
			'column_mappings' => 'required|array',
		]);

		// Retrieve column mappings from the request
		$columnMappings = $request->input('column_mappings');
        foreach ($columnMappings as $key => $value) {
            // Check if "contact_field" is null or empty
            if (isset($value['contact_field']) && ($value['contact_field'] === null || $value['contact_field'] === "")) {
                // Update "contact_field" to "notes"
                $columnMappings[$key]['contact_field'] = "notes";
            }
        }

		// Get the uploaded Excel file
		$uploadedFile = $request->file('contacts_file');

		// Create a unique filename for the uploaded file
		$filename = time() . '_' . $uploadedFile->getClientOriginalName();

		// Store the uploaded file in a temporary location
		$uploadedFile->storeAs('temp', $filename);

		// Define the path to the stored temporary file
		$filePath = storage_path('app/temp/' . $filename);

        
		Excel::import(new CustomerImport($columnMappings,$request->contact_source_id,$request->activity_id), $filePath);

		return redirect()->back()->with('success', 'Contacts imported successfully.');
    }
}
