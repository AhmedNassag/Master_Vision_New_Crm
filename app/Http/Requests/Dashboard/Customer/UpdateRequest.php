<?php

namespace App\Http\Requests\Dashboard\Customer;

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
            'email'             => 'nullable|email|unique:customers,email,' . request()->id,
            'mobile'            => 'required|unique:customers,mobile,' . request()->id, //|phone:AUTO
            'whats_app_mobile'  => 'nullable|unique:customers,whats_app_mobile,' . request()->id, //|phone:AUTO
            'national_id'       => 'nullable|numeric|unique:customers,national_id,' . request()->id,
            'address'           => 'nullable|string',
            'religion'          => 'nullable|in:muslim,christian,other',
            'marital_satus'     => 'nullable|in:Single,Married,Absolute,Widower,Other',
            'national_id'       => 'nullable|numeric',
            'contact_source_id' => 'required|integer|exists:contact_sources,id',
            'nationality_id'    => 'nullable|integer|exists:nationalities,id',
            'activity_id'       => 'required|integer|exists:activates,id',
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
            'mobile.phone'               => trans('validation.phone'),
            'national_id.numeric'        => trans('validation.numeric'),
            'contact_source_id.required' => trans('validation.required'),
            'contact_source_id.integer'  => trans('validation.integer'),
            'nationality_id.nullable'    => trans('validation.nullable'),
            'nationality_id.integer'     => trans('validation.integer'),
            'activity_id.required'       => trans('validation.required'),
            'activity_id.integer'        => trans('validation.integer'),
            'branch_id.required'         => trans('validation.required'),
            'branch_id.integer'          => trans('validation.integer'),
        ];
    }
}
