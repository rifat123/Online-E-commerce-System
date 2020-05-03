<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
        session()->flash('old1', 'lol');
        return [
            'name' => 'required|max:30',
            'company' => 'max:50',
            'address_1' => 'required|max:50',
            'address_2' => 'max:50',
            'thana' => 'required|max:20',
            'district' => 'required|max:20',
            'division' => 'required|max:20',
            'country' => 'required|max:20',
            'post_code' => 'required|digits:5'
        ];
    }
}
