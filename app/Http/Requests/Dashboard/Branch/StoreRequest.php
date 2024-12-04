<?php

namespace App\Http\Requests\Dashboard\Branch;

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
            'name' => 'required|string|unique:branches,name,NULL,id,deleted_at,NULL',
            'code' => 'required|string|unique:branches,code,NULL,id,deleted_at,NULL',
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
            'name.required' => trans('validation.required'),
            'name.string'   => trans('validation.string'),
            'name.unique'   => trans('validation.unique'),
        ];
    }
}
