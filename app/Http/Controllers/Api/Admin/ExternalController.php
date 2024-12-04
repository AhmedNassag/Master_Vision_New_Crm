<?php

namespace App\Http\Controllers\Api\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactCountry;
use App\Models\Country;
use App\Models\Customer;
use App\Models\CustomerCountry;
use App\Models\Industry;
use App\Traits\ImageTrait;
use App\Models\User;
use App\Traits\ApiResponseTrait;

class ExternalController extends Controller
{
    use ApiResponseTrait;
    use ImageTrait;

    public function Industries(Request $request)
    {
        return Industry::all();
    }

    public function countries(Request $request)
    {
        return Country::all();
    }

    public function storeContact(Request $request)
    {
        // dd($request->all());
        if ($request->type == 0) {

                $inputs = $request->except('photo');

                $data = Contact::create([
                    'name'                => $inputs['name'] ?? null,
                    'mobile' => isset($inputs['selected_flag_title'], $inputs['mobile']) && !empty($inputs['mobile'])
                    ? trim($inputs['selected_flag_title']) . trim($inputs['mobile'])
                    : $inputs['mobile'] ?? null,
                    'email'               => $inputs['email'] ?? null,
                    'company_name'        => $inputs['company'] ?? null,
                    'notes'               => $inputs['industry'] . '-'.  $inputs['industry'] ?? null,
                ]);

                if (!$data) {
                    return $this->apiResponse(null, 'An Error Occur', 401);
                }


                return true;


            //// else ///////
        } else {

                $inputs = $request->except('photo');


                $data =  Customer::create([
                    'name'             => $inputs['name'],
                    'mobile' => isset($inputs['selected_flag_title'], $inputs['mobile']) && !empty($inputs['mobile'])
                    ? trim($inputs['selected_flag_title']) . trim($inputs['mobile'])
                    : $inputs['mobile'] ?? null,
                    'email'            => $inputs['email'] ?? null,
                    'company_name'     => $inputs['company'] ?? null,
                    'notes'            => $inputs['industry'] . '-'.  $inputs['industry'],
                ]);


                if (!$data) {
                    return $this->apiResponse(null, 'An Error Occur', 401);
                }

                return true;

        }
    }
}
