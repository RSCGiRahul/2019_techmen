<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
//            'name' => 'bail|required|min:4|max:100',
//            'email' => 'bail|required|min:4|max:100|unique:users',
//            'phone' => 'bail|required|digits_between:1,13|numeric|unique:users',
//            'role' => 'bail|required',
//            'region' => 'bail|required',
        ];
    }

    public function message()
    {
        return [
//            'name.required' => ':attribute is required',
//            'name.min' => ':attribute should have :min character',
//            'name.max' => ':attribute should have :min character',
//            'email.required' => ':attribute is  required',
//            'email.unique' => ':attribute is not unique',
//            'phone.digits_between' => 'The :attribute must be between :min and :max digits.',
//
//            'role.required' => 'Select :attribute',
//            'region.required' => 'Select :attribute',
        ];
    }
}
