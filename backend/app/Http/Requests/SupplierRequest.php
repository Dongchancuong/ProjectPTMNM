<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SupplierRequest extends FormRequest
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
            'idnhacungcap'=>'required|max:20',
            'tennhacungcap'=>'required|max:100',
            'diachi'=>'required',
            'email'=>'required|email',
            'sdt'=>'required|digits:10',
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
            'idnhacungcap.required'         => 'Mã nhà cung cấp không được để trống',
            'idnhacungcap.max'              => 'Mã màu chỉ được tối đa 10 ký tự',
            'tennhacungcap.required'        => 'Tên nhà cung  cấp không được để trống',
            'tennhacungcap.max'             => 'Tên nhà cung cấp chỉ được tối đa 100 ký tự',
            'diachi.max'                    => 'Địa chỉ chỉ được tối đa 100 ký tự',
            'email.required'                => 'email không được để trống',
            'email.email'                   => 'Sai định dạng email',
            'sdt.required'                  => 'Số điện thoại không được để trống',
            'sdt.digits'                    => 'Số điện thoại không đủ 10 số',
        ];
    }
}
