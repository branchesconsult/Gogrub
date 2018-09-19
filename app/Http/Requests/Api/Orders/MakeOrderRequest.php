<?php

namespace App\Http\Requests\Api\Orders;

use Illuminate\Foundation\Http\FormRequest;

class MakeOrderRequest extends FormRequest
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
            'products' => 'required|array',
            'products.*.id' => 'required|integer',
            'products.*.qty' => 'required|integer',
            'products.*.special_instructions' => 'sometimes',
            'payment_method' => 'sometimes|in:cod',
            'coupon_code' => 'sometimes',
            'delivery_time' => 'sometimes|date_format:"Y-m-d H:i:s"',
            'user_comments' => 'sometimes',
            'address' => 'required',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ];


        if (!$this->request->get('products')) {
            for ($i = 1; $i < 2; $i++) {
                $rules['products.' . $i . '.qty'] = 'integer|required';
                $rules['products.' . $i . '.id'] = 'integer|required';
                $rules['products.' . $i . '.special_instructions'] = 'required';
            }
        }
        return $rules;
    }
}
