<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class MaterialRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'idchatlieu'=>'required|max:15',
            'tenchatlieu'=>'required|max:100',
        ];
    }
    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([

            'success'             => false,
            'message'             => 'Thất bại',
            'data'                => $validator->errors()
        ]),400);
    }
    
    public function messages()
    {
        return [
            'idmau.required'      => 'Mã chất liệu không được để trống',
            'idmau.max'         => 'Mã chất liệu chỉ được tối đa 15 ký tự',
            'tenmau.required'     => 'Tên chất liệu cấp không được để trống',
            'tenmau.max'       => 'Tên chất liệu chỉ được tối đa 100 ký tự',
        ];
    }
}
