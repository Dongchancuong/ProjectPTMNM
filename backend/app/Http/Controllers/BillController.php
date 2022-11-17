<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Http\Resources\Bill as BillResource;


class BillController extends Controller
{
    public function index()
    {
        $Bills = Bill::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách hóa đơn",
        'data'=>BillResource::collection($Bills)
        ];
        return response()->json($arr, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all(); 
        $validator = Validator::make($input, [
            'idkhachhang' => 'required',
            'idkhuyenmai' => 'nullable',
            'idphieudh' => 'required',
            'idnhanvien' => 'required',
            'hoten' => 'required',
            'diachi' => 'required',
            'sdt' => 'required',
            'email' => 'nullable',
            'tonggia' => 'required',
            'soluong' => 'required',
            'ngaylap' => 'required',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $bill = bill::create($input);
        $arr = ['status' => true,
           'message'=>"Thêm hóa đơn thành công",
           'data'=> new BillResource($bill)
        ];
        return response()->json($arr, 201);
    }

    public function update(Request $request, Bill $bill)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'idkhuyenmai' => 'nullable',
            'idnhanvien' => 'required',
            'hoten' => 'required',
            'diachi' => 'required',
            'sdt' => 'required',
            'email' => 'nullable',
            'tonggia' => 'required',
            'soluong' => 'required',
            'ngaylap' => 'required',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $bill->idkhuyenmai = $input['idkhuyenmai'];
        $bill->idnhanvien = $input['idnhanvien'];
        $bill->hoten = $input['hoten'];
        $bill->diachi = $input['diachi'];
        $bill->sdt = $input['sdt'];
        $bill->email = $input['email'];
        $bill->tonggia = $input['tonggia'];
        $bill->soluong = $input['soluong'];
        $bill->ngaylap = $input['ngaylap'];
        $bill->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật hóa đơn thành công',
           'data' => new BillResource($bill)
        ];
        return response()->json($arr, 200);
    }

    public function destroy(Bill $bill)
    {
        $bill->delete();
        $arr = [
            'status' => true,
            'message' =>'Hóa đơn đã được xóa',
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
