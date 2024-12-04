<?php

namespace App\Http\Requests\Dashboard\Meeting;

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
            'type'            => 'required|string',
            'meeting_place'   => 'required|string',
            'meeting_date'    => 'required|date',
            'follow_date'     => 'required|date',
            'revenue'         => 'required|numeric',
            'notes'           => 'required|string',
            'interests_ids.*' => 'required|integer|exists:interests,id',
            'contact_id'      => 'required|integer|exists:contacts,id',
            'reply_id'        => 'required|integer|exists:saved_replies,id',
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
            'type.required'            => trans('validation.required'),
            'name.string'              => trans('validation.string'),
            'meeting_place.required'   => trans('validation.required'),
            'meeting_place.string'     => trans('validation.string'),
            'meeting_date.required'    => trans('validation.required'),
            'meeting_date.date'        => trans('validation.date'),
            'follow_date.required'     => trans('validation.required'),
            'follow_date.date'         => trans('validation.date'),
            'revenue.required'         => trans('validation.required'),
            'revenue.numeric'          => trans('validation.numeric'),
            'notes.required'           => trans('validation.required'),
            'notes.string'             => trans('validation.string'),
            'interests_ids.*.required' => trans('validation.required'),
            'interests_ids.*.integer'  => trans('validation.integer'),
            'contact_id.required'      => trans('validation.required'),
            'contact_id.integer'       => trans('validation.integer'),
            'reply_id.required'        => trans('validation.required'),
            'reply_id.integer'         => trans('validation.integer'),
        ];
    }
}
