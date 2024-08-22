<?php

namespace App\Http\Requests\Dashboard\Blog;

use App\Models\Blog;
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
            'title' => 'required|max:255',
            'description' => 'required',
            'media' => 'required|file|mimes:png,jpg,jpeg,webp,mp4,mpeg,quicktime|max:10240'
        ];
    }

    public function messages()
    {
        return [
            'media.mimetypes' => 'The media must be a file of type: mp4, mpeg, quicktime.',
            'media.max' => 'The media may not be greater than 10 MB.',
        ];
    }
}
