<?php

namespace App\Http\Requests\Dashboard\SavedReply;

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
            'reply' => [
                'required', 'string',
                \Illuminate\Validation\Rule::unique('saved_replies', 'reply')->whereNull('deleted_at')->ignore(request()->id),
            ],
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
            'reply.required' => trans('validation.required'),
            'reply.string'   => trans('validation.string'),
            'reply.unique'   => trans('validation.unique'),
        ];
    }
}
