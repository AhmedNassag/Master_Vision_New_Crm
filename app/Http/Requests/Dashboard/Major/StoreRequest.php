<?php

namespace App\Http\Requests\Dashboard\Major;

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



    public function other_validations()
    {
        $count = \App\Models\Major::where(['name' => request()->name, 'industry_id' => request()->industry_id])->whereNull('deleted_at')->get();
        return $count;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->other_validations()->count() > 0)
        {
            return [
                'name' => 'unique:majors,name,NULL,id,deleted_at,NULL',
            ];
        }
        return [
            'name'        => 'required|string',
            'industry_id' => 'required|integer|exists:industries,id',
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
            'name.required'       => trans('validation.required'),
            'name.string'         => trans('validation.string'),
            'industry_id.integer' => trans('validation.required'),
            'industry_id.integer' => trans('validation.integer'),
        ];
    }
}
