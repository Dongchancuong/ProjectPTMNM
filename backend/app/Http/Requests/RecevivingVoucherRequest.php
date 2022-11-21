<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RecevivingVoucherRequest extends FormRequest
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
            'idpnh'=>'required|max:10',
            'idnhanvien'=>'required|max:10',
            'idnhacungcap'=>'required|max:20',
            'idsanpham'=>'required|max:30',
            'soluong'=>'required',
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
            'idpnh.required'                => 'Mã phiếu nhập không được để trống',
            'idpnh.max'                     => 'Mã phiếu nhập chỉ được tối đa 10 ký tự',
            'idnhanvien.required'           => 'Mã nhân viên không được để trống',
            'idnhanvien.max'                => 'Mã nhân viên chỉ được tối đa 10 ký tự',
            'idnhacungcap.max'              => 'Mã nhà cung cấp chỉ được tối đa 100 ký tự',
            'idnhacungcap.required'         => 'Mã nhà cung cấp không được để trống',
            'idsanpham.required'            => 'Mã sản phẩm không được để trống',
            'idsanpham.max'                 => 'Mã sản phẩm chỉ được tối đa 30 ký tự',
            'soluong.required'              => 'Số lượng sản phẩm không được để trống',
        ];
    
    }
}
