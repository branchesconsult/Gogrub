<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
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
            'full_name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users,email,' . \Auth::id(),
            'password' => 'sometimes|confirmed|min:6',
            'password_confirmation' => 'sometimes',
            'old_password' => 'sometimes',
            'dob' => 'sometimes',
            'avatar' => 'sometimes'
        ];
    }
}
