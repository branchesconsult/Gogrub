<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
            //
                'locationable_id'=>'integer|required',
                'user_role'=>'required',
                'location_point'=>'required',
                'address_map'=>'required',
                'address'=>'required',
                'city_id'=>'required|integer'
        ];
    }
}
