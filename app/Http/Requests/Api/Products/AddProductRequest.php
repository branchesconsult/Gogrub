<?php

namespace App\Http\Requests\Api\Products;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'product_images' => 'required|array',
            'cuisine_id' => 'required|numeric',
            'price' => 'required|numeric',
            'discounted_price' => 'sometimes|numeric',
            'availability_from' => 'required|date_format:"Y-m-d H:i:s"',
            'availability_to' => 'required|date_format:"Y-m-d H:i:s"',
            'serving_size' => 'required|integer',
            'total_servings' => 'required|integer',
            'description' => 'required',
            'preparation_time' => 'required|integer'
        ];
        return $rules;
    }
}
