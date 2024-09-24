<?php

namespace App\Http\Requests\Dashboard\Customer;

use App\Models\Customer;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }



    public function other_validations()
	{
		$normalizedIncomingNumber = substr(preg_replace('/\D/', '', request()->mobile), -10);
        $customer = Customer::whereRaw("SUBSTRING(mobile, -10) = ?", [$normalizedIncomingNumber])->get();

        return $customer;
	}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required|string',
            'address'           => 'nullable|string',
            'religion'          => 'nullable|in:muslim,christian,other',
            'marital_satus'     => 'nullable|in:Single,Married,Absolute,Widower,Other',
            'email'             => 'nullable|email|unique:customers,email,NULL,id,deleted_at,NULL',
            'mobile'            => 'required|regex:/^\d{11,}$/|unique:customers,mobile,NULL,id,deleted_at,NULL', //|phone:AUTO
            'whats_app_mobile'  => 'nullable|unique:customers,whats_app_mobile,NULL,id,deleted_at,NULL', //|phone:AUTO
            'national_id'       => 'nullable|numeric|unique:customers,national_id,NULL,id,deleted_at,NULL',
            'contact_source_id' => 'required|integer|exists:contact_sources,id',
            'nationality_id'    => 'nullable|integer|exists:nationalities,id',
            'activity_id'       => 'required|integer|exists:activates,id',
            'interest_id'       => 'required|integer|exists:interests,id',
            'branch_id'         => 'required|integer|exists:branches,id',
            'has_special_needs' => 'nullable',
        ];
    }


    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'name.required'              => trans('validation.required'),
            'name.string'                => trans('validation.string'),
            'address.nullable'           => trans('validation.nullable'),
            'address.string'             => trans('validation.string'),
            'religion.required'          => trans('validation.required'),
            'religion.in'                => trans('validation.in'),
            'mobile.required'            => trans('validation.required'),
            'mobile.numeric'             => trans('validation.numeric'),
            'mobile.unique'              => trans('validation.unique'),
            'national_id.numeric'        => trans('validation.numeric'),
            'national_id.unique'         => trans('validation.unique'),
            'contact_source_id.required' => trans('validation.required'),
            'contact_source_id.integer'  => trans('validation.integer'),
            'nationality_id.nullable'    => trans('validation.nullable'),
            'nationality_id.integer'     => trans('validation.integer'),
            'activity_id.required'       => trans('validation.required'),
            'activity_id.integer'        => trans('validation.integer'),
            'interest_id.required'       => trans('validation.required'),
            'interest_id.integer'        => trans('validation.integer'),
            'branch_id.required'         => trans('validation.required'),
            'branch_id.integer'          => trans('validation.integer'),
        ];
    }


    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            if ($this->other_validations()->count() > 0) {
                $validator->errors()->add('mobile', trans('main.The mobile number already exists'));
            }
        });
    }
}
