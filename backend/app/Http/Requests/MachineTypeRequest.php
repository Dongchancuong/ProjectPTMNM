<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class MachineTypeRequest extends FormRequest
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
            'idloaimay'=>'required|max:10',
            'tenloaimay'=>'required|max:100',
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
            'idloaimay.required'         => 'Mã loại máy không được để trống',
            'idloaimay.max'              => 'Mã loại máy chỉ được tối đa 10 ký tự',
            'tenloaimay.required'        => 'Tên loại máy không được để trống',
            'tenloaimay.max'             => 'Tên loại máy chỉ được tối đa 100 ký tự',
        ];
    }
}
