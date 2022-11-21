<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ColorRequest extends FormRequest
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
            'idmau'=>'required|max:10',
            'tenmau'=>'required|max:100',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([

            'success'   => false,
            'message'   => 'Thất bại',
            'data'      => $validator->errors()
        ]),400);
    }
    
    public function messages()
    {
        return [
            'idmau.required'        => 'Mã màu không được để trống',
            'idmau.max'             => 'Mã màu chỉ được tối đa 10 ký tự',
            'tenmau.required'       => 'Tên màu cấp không được để trống',
            'tenmau.max'            => 'Tên màu chỉ được tối đa 100 ký tự',
        ];
    }
}
