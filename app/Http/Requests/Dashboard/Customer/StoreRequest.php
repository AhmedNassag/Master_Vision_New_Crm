<?php

namespace App\Http\Requests\Dashboard\Customer;

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
            'mobile'            => 'required|numeric|unique:customers,mobile',
            'national_id'       => 'nullable|numeric|unique:customers,national_id',
            'contact_source_id' => 'required|integer|exists:contact_sources,id',
            'activity_id'       => 'required|integer|exists:activates,id',
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
            'mobile.required'           => trans('validation.required'),
            'mobile.numeric'            => trans('validation.numeric'),
            'mobile.unique'             => trans('validation.unique'),
            'national_id.numeric'       => trans('validation.numeric'),
            'national_id.unique'        => trans('validation.unique'),
            'contact_source_id.integer' => trans('validation.required'),
            'contact_source_id.integer' => trans('validation.integer'),
            'activity_id.integer'       => trans('validation.required'),
            'activity_id.integer'       => trans('validation.integer'),
        ];
    }
}
