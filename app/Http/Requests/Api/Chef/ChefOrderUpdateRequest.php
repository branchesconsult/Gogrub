<?php

namespace App\Http\Requests\Api\Chef;

use Illuminate\Foundation\Http\FormRequest;

class ChefOrderUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // return access()->hasRoles('chef','Rider');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'orderstatus_id' => 'required'
        ];
    }
}
