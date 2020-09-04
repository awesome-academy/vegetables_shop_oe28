<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'payment_method' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('messages.name_required'),
            'address.required' => trans('messages.address_required'),
            'phone.required' => trans('messages.phone_required'),
            'payment_method.required' => trans('messages.payment_method_required'),
        ];
    }
}
