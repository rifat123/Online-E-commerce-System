<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
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
        $oldData = array_reverse($this->request->all());
        session()->flash('oldData', $oldData);
        //dd(session()->get('oldData'));
        return [
            'Picture_1' => 'mimetypes:image/jpeg,image/png|dimensions:width=600,height=600',
            'Picture_2' => 'mimetypes:image/jpeg,image/png|dimensions:width=600,height=600',
            'Picture_3' => 'mimetypes:image/jpeg,image/png|dimensions:width=600,height=600',
            'Picture_4' => 'mimetypes:image/jpeg,image/png|dimensions:width=600,height=600',
            'Picture_5' => 'mimetypes:image/jpeg,image/png|dimensions:width=600,height=600',
            'Picture_6' => 'mimetypes:image/jpeg,image/png|dimensions:width=600,height=600',
            'nothing' => 'size:7',
        ];
    }
}
