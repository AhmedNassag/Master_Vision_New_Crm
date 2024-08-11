<?php

namespace App\Http\Requests\Dashboard\Contact;

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
            'email'             => 'nullable|email|unique:contacts,email,NULL,id,deleted_at,NULL',
            'religion'          => 'nullable|in:muslim,christian,other',
            'marital_satus'     => 'nullable|in:Single,Married,Absolute,Widower,Other',
            'mobile'            => 'required|numeric|unique:contacts,mobile,NULL,id,deleted_at,NULL',
            'national_id'       => 'nullable|numeric|unique:contacts,national_id,NULL,id,deleted_at,NULL',
            'contact_source_id' => 'required|integer|exists:contact_sources,id',
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
            'name.required'             => trans('validation.required'),
            'name.string'               => trans('validation.string'),
            'address.nullable'          => trans('validation.nullable'),
            'address.string'            => trans('validation.string'),
            'religion.required'         => trans('validation.required'),
            'religion.in'               => trans('validation.in'),
            'mobile.required'           => trans('validation.required'),
            'mobile.numeric'            => trans('validation.numeric'),
            'mobile.unique'             => trans('validation.unique'),
            'national_id.numeric'       => trans('validation.numeric'),
            'national_id.unique'        => trans('validation.unique'),
            'contact_source_id.integer' => trans('validation.required'),
            'contact_source_id.integer' => trans('validation.integer'),
            'activity_id.integer'       => trans('validation.required'),
            'activity_id.integer'       => trans('validation.integer'),
            'interest_id.integer'       => trans('validation.required'),
            'interest_id.integer'       => trans('validation.integer'),
            'branch_id.integer'         => trans('validation.required'),
            'branch_id.integer'         => trans('validation.integer'),
        ];
    }
}
