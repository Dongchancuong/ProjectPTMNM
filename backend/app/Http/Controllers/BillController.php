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

    public function getNewID()
    {
        $last_id = Bill::select('idhoadon')->orderBy('idhoadon', 'DESC')->first();
        $split_id = str_split($last_id['idhoadon'], 2);
        $newid = $split_id['1'] + 1;
        if ($newid < 10) $idhd= "HD0".$newid;
        else $idhd = "HD".$newid;
        return idhd;
    }

    public function store(Request $request)
    {
        $input = $request->all(); 
        $input['hoadon'] = $this->getNewID();
        $validator = Validator::make($input, [
            'idhoadon' => 'required',
            'idkhachhang' => 'required',
            'idkhuyenmai' => 'nullable',
            'idnhanvien' => 'nullable',
            'hoten' => 'required',
            'diachi' => 'required',
            'sdt' => 'required',
            'email' => 'required',
            'tonggia' => 'required',
            'soluong' => 'required',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $bill = Bill::create($input);
        (new AccountController)->store($request);
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
            'idhoadon' => 'required',
            'idnhanvien' => 'required',
            'visible' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $bill = Bill::find($input['idhoadon']);
        $bill->idnhanvien = $input['idnhanvien'];
        $bill->visible = $input['visible'];
        $bill->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật hóa đơn thành công',
           'data' => new BillResource($bill)
        ];
        return response()->json($arr, 200);
    }

    // public function destroy(Bill $bill)
    // {
    //     $bill->delete();
    //     $arr = [
    //         'status' => true,
    //         'message' =>'Hóa đơn đã được xóa',
    //         'data' => [],
    //     ];
    //     return response()->json($arr, 200);
    // }
}
