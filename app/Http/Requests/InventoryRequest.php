<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
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
            'name' => 'required|max:100|unique:inventories',
            'quantity' => 'required',
//            'per_unit_price' => 'required'
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'Name is required',
            'name.max' => 'Name not should be :max length',
             'name.unique' => 'Name is not unique',
            'quantity.required' => 'Quantity is required',
//            'per_uni_price.required' => ''

        ];
    }
}
