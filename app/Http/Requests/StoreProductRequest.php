<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'category_id' => 'required',
            'suplier_id' => 'required',
            'price' => 'required',
            'weight_item' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('messages.name_required'),
            'category_id.required' => trans('messages.category_required'),
            'suplier_id.required' => trans('messages.suplier_required'),
            'price.required' => trans('messages.price_required'),
            'weight_item.required' => trans('messages.weight_item_required'),
        ];
    }
}
