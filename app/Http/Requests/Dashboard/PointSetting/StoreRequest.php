<?php

namespace App\Http\Requests\Dashboard\PointSetting;

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
            'conversion_rate'       => 'required|numeric',
            'sales_conversion_rate' => 'nullable|numeric',
            'points'                => 'nullable|numeric',
            'expiry_days'           => 'nullable|numeric',
            'activity_id'           => 'required|integer|exists:activates,id',
            'sub_activity_id'       => 'required|integer|exists:interests,id',
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
            'conversion_rate.required'       => trans('validation.required'),
            'conversion_rate.numeric'        => trans('validation.numeric'),
            'sales_conversion_rate.required' => trans('validation.required'),
            'sales_conversion_rate.numeric'  => trans('validation.numeric'),
            'points.required'                => trans('validation.required'),
            'points.numeric'                 => trans('validation.numeric'),
            'expiry_days.required'           => trans('validation.required'),
            'expiry_days.numeric'            => trans('validation.numeric'),
            'activity_id.integer'            => trans('validation.required'),
            'activity_id.integer'            => trans('validation.integer'),
            'sub_activity_id.integer'        => trans('validation.required'),
            'sub_activity_id.integer'        => trans('validation.integer'),
        ];
    }
}
