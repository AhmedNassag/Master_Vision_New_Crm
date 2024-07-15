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
            'mobile'            => 'required|numeric',
            'address'           => 'nullable|string',
            'religion'          => 'required|in:muslim,christian,other',
            'national_id'       => 'nullable|numeric',
            'contact_source_id' => 'required|integer|exists:contact_sources,id',
            'activity_id'       => 'required|integer|exists:activates,id',
            'branch_id'         => 'required|integer|exists:branches,id',
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
            'branch_id.integer'         => trans('validation.required'),
            'branch_id.integer'         => trans('validation.integer'),
        ];
    }
}
