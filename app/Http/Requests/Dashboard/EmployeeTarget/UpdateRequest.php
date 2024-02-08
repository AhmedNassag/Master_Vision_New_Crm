<?php

namespace App\Http\Requests\Dashboard\EmployeeTarget;

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
            'month'           => 'required',
            'employee_id'     => 'required|exists:employees,id',
            'activity_id.*'   => 'required|exists:activates,id',
            'amount_target.*' => 'required|integer|min:0',
            'calls_target.*'  => 'required|integer|min:0',
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
            'month.required'           => trans('validation.required'),
            'employee_id.required'     => trans('validation.required'),
            'activity_id.*.required'   => trans('validation.required'),
            'amount_target.*.required' => trans('validation.required'),
            'amount_target.*.integer'  => trans('validation.integer'),
            'amount_target.*.min'      => trans('validation.min'),
            'calls_target.*.required'  => trans('validation.required'),
            'calls_target.*.integer'   => trans('validation.integer'),
            'calls_target.*.min'       => trans('validation.min'),
        ];
    }
}
