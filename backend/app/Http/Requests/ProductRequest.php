<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //Product check value input
            'idsanpham' => 'required|max:30',
            'idkhuyenmai' =>'max:20',
            'idnhacungcap' => 'required|max:10',
            'tensanpham' => 'required|max:100',      
            'soluong'=>'required',            
            'dongia'=>'required',
            //ProductDetail check value input
            'idthuonghieu'=>'max:40',
            'idmau'=>'max:10',
            'idloaimay'=>'max:10',
            'idchatlieu'=>'max:15',
            'xuatxu'=>'max:100',
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
            //Product 
            'idsanpham.required'        => 'Mã sản phẩm không được để trống',
            'idsanpham.max'             => 'Mã sản phẩm chỉ được tối đa 30 ký tự',
            'idkhuyenmai.max'           => 'Mã khuyến mãi chỉ được tối đa 10 ký tự',
            'idnhacungcap.required'     => 'Mã nhà cung cấp không được để trống',
            'idnhacungcap.max'          => 'Mã sản phẩm chỉ được tối đa 30 ký tự',
            'tensanpham.required'       => 'Tên sản phẩm không được để trống',
            'idnhacungcap.max'          => 'Tên sản phẩm chỉ được tối đa 100 ký tự',
            'soluong.required'          => 'Số lượng sản phẩm không được để trống',
            'dongia.required'           => 'Đơn giá sản phẩm không được để trống',
            //ProductDetail
            'idthuonghieu.max'          => 'Mã thương hiệu chỉ được tối đa 40 ký tự',
            'idmau.max'                 => 'Tên sản phẩm chỉ được tối đa 100 ký tự',
            'soluong.required'          => 'Số lượng sản phẩm không được để trống',
            'dongia.required'           => 'Đơn giá sản phẩm không được để trống',    
            'xuatxu.max'                => 'Xuất xứ chỉ được tối đa 5 ký tự',   
        ];

    }
}
