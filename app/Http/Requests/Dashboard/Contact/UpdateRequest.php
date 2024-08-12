<?php

namespace App\Http\Requests\Dashboard\Contact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'religion'          => 'nullable|in:muslim,christian,other',
            'marital_satus'     => 'nullable|in:Single,Married,Absolute,Widower,Other',
            'email'             => 'nullable|email|unique:contacts,email,' . request()->id,
            'mobile'            => 'required|numeric|unique:contacts,mobile,' . request()->id,
<<<<<<< HEAD
            'whats_app_mobile'  => 'nullable|unique:contacts,whats_app_mobile,' . request()->id,
=======
>>>>>>> b84542779b463f5ad863339bceca911ba0a0a68f
            'national_id'       => 'nullable|numeric|unique:contacts,national_id,' . request()->id,
            'national_id'       => 'nullable|numeric',
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
            'national_id.numeric'       => trans('validation.numeric'),
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
