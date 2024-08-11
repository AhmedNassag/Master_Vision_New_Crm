<?php

namespace App\Http\Requests\Dashboard\Service;

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
        $count = \App\Models\Service::where(['name' => request()->name, 'interest_id' => request()->interest_id])->whereNull('deleted_at')->get();
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
                'name' => 'unique:services,name,NULL,id,deleted_at,NULL',
            ];
        }
        return [
            'name'        => 'required|string',
            'interest_id' => 'required|integer|exists:interests,id',
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
            'name.unique'         => trans('validation.unique'),
            'interest_id.integer' => trans('validation.required'),
            'interest_id.integer' => trans('validation.integer'),
        ];
    }
}
