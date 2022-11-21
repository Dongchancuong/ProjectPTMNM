<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class TrademaskRequest extends FormRequest
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
            'idthuonghieu'=>'required|max:40',
            'tenthuonghieu'=>'required|max:100',
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
            'idthuonghieu.required'         => 'Mã thương hiệu không được để trống',
            'idthuonghieu.max'              => 'Mã thương hiệu chỉ được tối đa 40 ký tự',
            'tenthuonghieu.required'        => 'Tên thương hiệu cấp không được để trống',
            'tenthuonghieu.max'             => 'Tên thương hiệu chỉ được tối đa 100 ký tự',
        ];
    }
}
