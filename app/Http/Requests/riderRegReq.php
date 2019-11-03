<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class riderRegReq extends FormRequest
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
             'cnic_image' => 'required|array',
             'licence_image'=>'required|array'
        ];
    }
}
