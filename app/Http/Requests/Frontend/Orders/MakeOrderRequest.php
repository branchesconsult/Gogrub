<?php

namespace App\Http\Requests\Frontend\Orders;

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
        return [
//            //Customer
//            'customer_phone' => 'required',
//            'customer_address' => 'required',
//            'customer_province' => 'sometimes',
//            'customer_country' => 'sometimes',
//            'customer_city' => 'sometimes',
//            'customer_lat' => 'required|numeric',
//            'customer_lng' => 'required|numeric',
//            //MISC
//            'payment_method' => 'required|in:cod,mobicash',
//            'coupon_code' => 'sometimes',
//            'estimate_delivery_mins' => 'required|integer',
//            'user_comments' => 'sometimes',
        ];
    }
}
