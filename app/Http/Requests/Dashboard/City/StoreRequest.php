<?php

namespace App\Http\Requests\Dashboard\City;

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
            'name'       => 'required|string',
            'country_id' => 'required|integer|exists:countries,id',
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
            'name.required'     => trans('validation.required'),
            'name.string'       => trans('validation.string'),
            'country_id.integer' => trans('validation.required'),
            'country_id.integer' => trans('validation.integer'),
        ];
    }
}
