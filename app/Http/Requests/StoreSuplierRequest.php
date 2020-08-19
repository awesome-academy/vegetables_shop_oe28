<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuplierRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|unique:supliers',
            'phone' => 'required|unique:supliers',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('messages.name_required'),
            'name.max' => trans('messages.name_max'),
            'email.required' => trans('messages.email_required'),
            'email.unique' => trans('messages.email_unique'),
            'phone.required' => trans('messages.phone_required'),
            'phone.unique' => trans('messages.phone_unique'),
            'address.required' => trans('messages.address_required'),
        ];
    }
}
