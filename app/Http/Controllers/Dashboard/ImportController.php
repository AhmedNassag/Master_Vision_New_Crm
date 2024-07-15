<?php

/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Resources\ContactsResource;
use App\Imports\ContactsImport;
use Auth;
use DB;
use Validator;
use Yajra\DataTables\Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use App\Models\Contact;
use App\Services\ContactFilterService;
use App\Services\LeadConversionService;
use App\Services\LeadHistoryService;

use App\Models\Job_title;
use App\Models\Contact_category;
use App\Models\Contact_source;
use App\Models\City;
use App\Models\Area;
use App\Models\Industry;
use App\Models\Major;
use App\Models\Activate;
use App\Models\Employee;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportController extends Controller
{

    public function fetchExcelColumns(Request $request)
    {
        try {

            // Validate the uploaded file
            $request->validate([
                'excel_file' => 'required|mimes:xlsx,xls',
            ]);

            // Read the Excel file to fetch column names
            $excelColumns = [];

            $filePath            = $request->file('excel_file')->getRealPath();
            $spreadsheet         = IOFactory::load($filePath);
            $worksheet           = $spreadsheet->getActiveSheet();
            $highestColumn       = $worksheet->getHighestColumn();

            $highestColumnNumber = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

            for ($colNumber = 1; $colNumber <= $highestColumnNumber; $colNumber++) {
                $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colNumber);
                $excelColumns[] = $worksheet->getCell($col . '1')->getValue();
            }

            // You will need to provide data for $contactFields and $lookupTables
            if($request->type == 'customer')
            {
                $contactFields = [
                    'name'              => trans('main.Name'),
                    'mobile'            => trans('main.Mobile'),
                    'mobile2'           => trans('main.Mobile2'),
                    'email'             => trans('main.Email'),
                    'company_name'      => trans('main.Company Name'),
                    'city_id'           => trans('main.City'),
                    'area_id'           => trans('main.Area'),
                    // 'contact_source_id' => trans('main.ContactSource'),
                    'job_title_id'      => trans('main.Job Title ID'),
                    'industry_id'       => trans('main.Industry ID'),
                    'major_id'          => trans('main.Major ID'),
                    'notes'             => trans('main.Notes'),
                    'gender'            => trans('main.Gender'),
                ];
            }else{
                $contactFields = [
                    'name'              => trans('main.Name'),
                    'mobile'            => trans('main.Mobile'),
                    'mobile2'           => trans('main.Mobile2'),
                    'email'             => trans('main.Email'),
                    'company_name'      => trans('main.Company Name'),
                    'city_id'           => trans('main.City'),
                    'area_id'           => trans('main.Area'),
                    // 'contact_source_id' => trans('main.ContactSource'),
                    'job_title_id'      => trans('main.Job Title'),
                    'industry_id'       => trans('main.Industry'),
                    'major_id'          => trans('main.Major'),
                    'notes'             => trans('main.Notes'),
                    'gender'            => trans('main.Gender'),
                    'is_trashed'        => trans('main.Is Trashed'),
                    'birth_date'        => trans('main.Birth Date'),
                    'national_id'       => trans('main.National ID'),
                    'code'              => trans('main.Code'),
                    'is_active'         => trans('main.Is Active'),
                ];
            }

            $view = View::make('partials.excel_columns', compact('excelColumns', 'contactFields'));
            return $view;

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
