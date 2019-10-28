<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegionRequest extends FormRequest
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
            'name' => 'required|min:4|max:30',
            'pincode' => 'required|min:3|max:12',
            //'state' => 'required',
            //'district' => 'required',
        ];
    }

    public function message()
    {
        return [
            'name.required' => ':attribute can\'t be null ',
            'name.min' => ':attribute min length',
            'name.max' => ':attribute max length ',
            'pincode.required' => ':attribute can\'t be null',
          //  'state.required' => ':attribute can\'t be null',
           // 'district.required' => ':attribute can\'t be null',
        ];
    }
}
