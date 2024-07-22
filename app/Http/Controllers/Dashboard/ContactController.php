<?php

namespace App\Http\Controllers\Dashboard;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\JobTitle;
use App\Models\ContactCategory;
use App\Models\ContactSource;
use App\Models\City;
use App\Models\Area;
use App\Models\Industry;
use App\Models\Major;
use App\Models\Activity;
use App\Models\Employee;
use App\Exports\ContactExport;
use App\Imports\ContactImport;
use App\Repositories\Dashboard\Contact\ContactInterface;
use App\Http\Requests\Dashboard\Contact\StoreRequest;
use App\Http\Requests\Dashboard\Contact\UpdateRequest;
use App\Services\LeadConversionService;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\ContactFilterService;


class ContactController extends Controller
{
    protected $contact;

    public function __construct(ContactInterface $contact)
    {
        $this->contact = $contact;
        $this->middleware('permission:عرض جهات الإتصال', ['only' => ['index','show']]);
        $this->middleware('permission:إضافة جهات الإتصال', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل جهات الإتصال', ['only' => ['edit','update','relateSelected','relateEmployee']]);
        $this->middleware('permission:حذف جهات الإتصال', ['only' => ['destroy','deleteSelected']]);
        $this->middleware('permission:أرشفة جهات الإتصال', ['only' => ['trashed','trashSelected','changeTrash']]);
        $this->middleware('permission:تصدير جهات الإتصال', ['only' => ['exportView','exportData']]);
        $this->middleware('permission:إستيراد جهات الإتصال', ['only' => ['importData']]);
        $this->middleware('permission:تغيير حالات تنشيط جهات الإتصال', ['only' => ['activateSelected','changeActive','changeStatus']]);
        // $this->middleware('permission:إضافة مكالمات جهات الإتصال', ['only' => ['index']]);
        // $this->middleware('permission:إرسال رسائل جهات الإتصال', ['only' => ['index']]);
    }



    public function index(Request $request)
    {
        return $this->contact->index($request);
    }



    public function show($id)
    {
        return $this->contact->show($id);
    }



    public function create()
    {
        return $this->contact->create();
    }



    public function store(StoreRequest $request)
    {
        return $this->contact->store($request);
    }



    public function edit($id)
    {
        return $this->contact->edit($id);
    }



    public function update(UpdateRequest $request)
    {
        return $this->contact->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->contact->destroy($request);
    }



    public function deleteSelected(Request $request)
    {
        return $this->contact->deleteSelected($request);
    }



    public function trashSelected(Request $request)
    {
        return $this->contact->trashSelected($request);
    }



    public function activateSelected(Request $request)
    {
        return $this->contact->activateSelected($request);
    }



    public function relateSelected(Request $request)
    {
        return $this->contact->relateSelected($request);
    }



    public function changeActive(Request $request)
    {
        return $this->contact->changeActive($request);
    }



    public function changeTrash(Request $request)
    {
        return $this->contact->changeTrash($request);
    }



    public function relateEmployee(Request $request)
    {
        return $this->contact->relateEmployee($request);
    }



    public function trashed(Request $request)
    {
        return $this->contact->trashed($request);
    }



    public function changeStatus(Request $request, LeadConversionService $leadConversionService)
	{
        try {

            $validator = Validator::make($request->all(), [
                'status'                 => 'required|in:new,contacted,qualified,converted',
                'invoice'                => ['required_if:status,converted','array','min:1'],
                'invoice.invoice_number' => 'required_if:status,converted',
                'invoice.invoice_date'   => 'required_if:status,converted',
                'invoice.total_amount'   => 'required_if:status,converted',
                'invoice.amount_paid'    => 'required_if:status,converted',
                'invoice.debt'           => 'required_if:status,converted',
                'invoice.description'    => 'nullable:status,converted',
                'invoice.status'         => 'required_if:status,converted',
            ]);

            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $lead = Contact::findOrFail($request->input('contact_id'));
            // Check if the status transition is allowed
            if (!$this->isStatusTransitionAllowed($lead, $request->input('status')))
            {
                session()->flash('error');
                return redirect()->back();
            }

            // Perform the status transition
            switch ($request->input('status'))
            {
                case 'contacted':
                    $leadConversionService->transitionToContacted($lead);
                    break;
                case 'qualified':
                    $leadConversionService->transitionToQualified($lead);
                    break;
                case 'converted':
                    $invoice = $request->invoice;
                    $leadConversionService->convertToCustomer($lead, $invoice,$request->input('next_reorder_reminder'));
                    break;
            }

            session()->flash('success');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}



    public function exportView()
    {
        try {

            $jobTitles         = JobTitle::get(['id','name']);
            $contactCategories = ContactCategory::get(['id','name']);
            $contactSources    = ContactSource::get(['id','name']);
            $cities            = City::get(['id','name']);
            $areas             = Area::get(['id','name']);
            $industries        = Industry::get(['id','name']);
            $majors            = Major::get(['id','name']);
            $activities        = Activity::get(['id','name']);
            $employees         = Employee::get(['id','name']);

            return view('dashboard.contact.export',compact('jobTitles','contactCategories','contactSources','cities','areas','industries','majors','activities','employees'));

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function exportData(Request $request)
    {
        try {

            session()->flash('success');
            return Excel::download(new ContactExport($request), 'contacts.xlsx');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }



    public function importData(Request $request)
    {
        try {

            $request->validate([
                'contacts_file'   => 'required|mimes:xlsx,xls',
                'column_mappings' => 'required|array',
            ]);

            // Retrieve column mappings from the request
            $columnMappings = $request->input('column_mappings');

            foreach ($columnMappings as $key => $value) {
                // if(!$columnMappings[$key]['contact_field'] = "name" || !$columnMappings[$key]['contact_field'] = "mobile")
                // {

                // }
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

            $importInstance = new ContactImport($columnMappings, $request->contact_source_id, $request->activity_id, $request->interest_id);
            Excel::import($importInstance, $filePath);

            $rowsSavedCount   = $importInstance->getRowsSavedCount();
            $rowsSkippedCount = $importInstance->getRowsSkippedCount();

            return redirect()->back()->with('success', "Contacts imported successfully. Rows saved: $rowsSavedCount, Rows skipped: $rowsSkippedCount.");

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    private function isStatusTransitionAllowed(Contact $lead, $newStatus)
	{
        try {
            $currentStatus = $lead->status;
            // Define allowed transitions based on your conditions
            $allowedTransitions = [
                'new'       => ['contacted', 'qualified', 'converted'],
                'contacted' => ['qualified', 'converted'],
                'qualified' => ['converted'],
                'converted' => ['converted'],
            ];

            return in_array($newStatus, $allowedTransitions[$currentStatus]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

}
