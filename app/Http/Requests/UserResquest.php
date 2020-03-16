<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserResquest extends FormRequest
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
            'email' => 'required',
            'role_id' => 'required',
            'status' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name can not be blank',
            'email.required' => 'email can not be blank',
            'role_id.required' => 'Select any one of role',
            'status.required' => 'Select any one of Status',
            'password.required' => 'Password can not be blank',
            'password_confirmation.required' => 'confirm password can not be blank'
            // 'name.required' => 'Name can not be blank',
        ];

    }
}
