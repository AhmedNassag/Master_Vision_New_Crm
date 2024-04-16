<?php

namespace App\Http\Requests\Dashboard\Notification;

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
            'notification' => 'required|string',
            'employee_id'  => 'required_if:dept,null',
            'dept'         => 'required_if:employee_id,null',
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
            'notification.required' => trans('validation.required'),
            'notification.string'   => trans('validation.string'),
        ];
    }
}
