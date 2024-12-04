<?php

namespace App\Http\Requests\Dashboard\Area;

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



    public function other_validations()
    {
        $count = \App\Models\Area::where(['name' => request()->name, 'city_id' => request()->city_id])->whereNull('deleted_at')->where('id', '!=', request()->id)->get();
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
                'name' => 'unique:areas,name,NULL,id,deleted_at,NULL',
            ];
        }
        return [
            'name'    => 'required|string',
            'city_id' => 'required|integer|exists:cities,id',
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
            'name.required'   => trans('validation.required'),
            'name.string'     => trans('validation.string'),
            'city_id.integer' => trans('validation.required'),
            'city_id.integer' => trans('validation.integer'),
        ];
    }
}
