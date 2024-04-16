<?php

namespace App\Http\Requests\Dashboard\SubActivity;

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
        $count = \App\Models\SubActivity::where(['name' => request()->name, 'activity_id' => request()->activity_id])->whereNull('deleted_at')->get();
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
                'name' => 'unique:interests,name,NULL,id,deleted_at,NULL',
            ];
        }
        return [
            'name'        => 'required|string',
            'activity_id' => 'required|integer|exists:activates,id',
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
            'activity_id.integer' => trans('validation.required'),
            'activity_id.integer' => trans('validation.integer'),
        ];
    }
}
