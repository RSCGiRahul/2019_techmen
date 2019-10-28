<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:200|unique:products',
            'brand_id' => 'required',
        ];
    }
    public  function message()
    {
        return [
            'name.required' => 'Name is required',
            'name.unique' => 'Product Name is already exist',
            'brand_id.required' => 'Select Brand'
        ];
    }
}
