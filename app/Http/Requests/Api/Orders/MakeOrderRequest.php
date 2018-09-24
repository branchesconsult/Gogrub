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
            //Product
            'products' => 'required|array',
            'products.*.id' => 'required|integer',
            'products.*.qty' => 'required|integer',
            'products.*.special_instructions' => 'sometimes',
            //Customer
            'customer_phone' => 'required',
            'customer_address' => 'required',
            'customer_province' => 'sometimes',
            'customer_country' => 'sometimes',
            'customer_city' => 'sometimes',
            'customer_lat' => 'required|numeric',
            'customer_lng' => 'required|numeric',
            //MISC
            'payment_method' => 'sometimes|in:cod',
            'coupon_code' => 'sometimes',
            'estimate_delivery_mins' => 'required|integer',
            'user_comments' => 'sometimes',
            'payment_method' => 'required|in:cod,mobicash'
        ];


        if (!$this->request->get('products')) {
            for ($i = 0; $i < 2; $i++) {
                $rules['products.' . $i . '.qty'] = 'required|integer';
                $rules['products.' . $i . '.id'] = 'required|integer';
                $rules['products.' . $i . '.special_instructions'] = 'sometimes';
            }
        }
        return $rules;
    }
}
