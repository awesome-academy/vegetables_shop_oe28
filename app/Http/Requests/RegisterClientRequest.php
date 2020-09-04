<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            're_password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('messages.name_required'),
            'email.required' => trans('messages.email_required'),
            'email.unique' => trans('messages.email_unique'),
            'password.required' => trans('messages.password_required'),
            're_password.required' => trans('messages.re_password_required'),
        ];
    }
}
