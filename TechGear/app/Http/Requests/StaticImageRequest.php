<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaticImageRequest extends FormRequest
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
            'picture' => 'mimetypes:image/jpeg,image/png,image/gif|dimensions:width=371,height=245',
            'note' => 'max:10000',
        ];
    }
}
