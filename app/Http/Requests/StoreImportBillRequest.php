<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImportBillRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'suplier_id' => 'required',
            'import_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'suplier_id.required' => trans('messages.supplier_id_require'),
            'import_date.required' => trans('messages.import_date_require'),
        ];
    }
}
