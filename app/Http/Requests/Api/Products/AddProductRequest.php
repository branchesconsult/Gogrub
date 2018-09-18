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
        return [
            'name' => 'required',
            'product_images' => 'sometimes|array',
            'cuisine_id' => 'required|numeric',
            'price' => 'required|numeric',
            'discounted_price' => 'sometimes|numeric',
            'availability_form' => 'required|date_format:"d-m-Y H:i"',
            'availability_to' => 'sometimes|date_format:"d-m-Y H:i"',
            'serving_size' => 'required|integer',
            'total_servings' => 'required|integer',
            'description' => 'required',
        ];
    }
}
