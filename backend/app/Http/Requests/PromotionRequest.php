<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PromotionRequest extends FormRequest
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
            
            'idkhuyenmai'=>'required|max:20',
            'tenchuongtrinh'=>'required|max:40',
            'giamgia'=>'required|max:50',
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
            'idkhuyenmai.required'          => 'Mã chương trình khuyến mãi không được để trống',
            'idkhuyenmai.max'               => 'Mã chương trình khuyến mãi chỉ được tối đa 20 ký tự',
            'tenchuongtrinh.required'       => 'Tên chương trình không được để trống',
            'tenchuongtrinh.max'            => 'Tên chương trình chỉ được tối đa 40 ký tự',
            'giamgia.required'              => 'Khuyến mãi giảm giá không được để trống',
            'giamgia.max'                   => 'Khuyến mãi giảm giá tối đa 50%',
        ];  
    }
}
