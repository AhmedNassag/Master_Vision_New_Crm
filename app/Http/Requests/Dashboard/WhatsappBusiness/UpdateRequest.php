<?php

namespace App\Http\Requests\Dashboard\WhatsappBusiness;

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
            'whatsapp_business_phone_number_id' => 'required|string',
            'whatsapp_business_access_token'    => 'required|string',
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
            'whatsapp_business_phone_number_id.required' => trans('validation.required'),
            'whatsapp_business_phone_number_id.string'   => trans('validation.string'),
            'whatsapp_business_access_token.required'    => trans('validation.required'),
            'whatsapp_business_access_token.string'      => trans('validation.string'),
        ];
    }
}
