<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterNewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('messages.email_required'),
            'email.unique' => trans('messages.email_unique'),
        ];
    }
}
