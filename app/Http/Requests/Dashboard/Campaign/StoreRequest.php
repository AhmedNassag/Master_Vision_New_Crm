<?php

namespace App\Http\Requests\Dashboard\Campaign;

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
            'url'               => 'nullable|string',
            'activity_id'       => 'required|integer|exists:activates,id',
            'interest_id'       => 'required|integer|exists:interests,id',
            'contact_source_id' => 'required|integer|exists:contact_sources,id',
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
            'name.required'            => trans('validation.required'),
            'name.string'              => trans('validation.string'),
            'url.string'               => trans('validation.string'),
            'activity_id.integer'      => trans('validation.required'),
            'activity_id.integer'      => trans('validation.integer'),
            'subActivity_id.integer'   => trans('validation.required'),
            'subActivity_id.integer'   => trans('validation.integer'),
            'contactSource_id.integer' => trans('validation.required'),
            'contactSource_id.integer' => trans('validation.integer'),
        ];
    }
}
