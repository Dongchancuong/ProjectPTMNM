<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\PositionDetail;
use App\Http\Resources\PositionDetail as PositionDetailResource;


class PositionDetailController extends Controller
{
    public function index()
    {
        $positiondetails = PositionDetail::all();
        $arr = [
        'status' => true,
        'message' => "Chi tiết chức vụ",
        'data'=>PositionDetailResource::collection($positiondetails)
        ];
        return response()->json($arr, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all(); 
        $validator = Validator::make($input, [
            'idchucvu' => 'required',
            'idchucnang' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $positiondetail = PositionDetail::create($input);
        $arr = ['status' => true,
           'message'=>"Thêm chức năng cho chức vụ thành công",
           'data'=> new PositionDetailResource($positiondetail)
        ];
        return response()->json($arr, 201);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, PositionDetail $positiondetail)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'idchucvu' => 'required',
            'idchucnang' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $positiondetail->idchucvu = $input['idchucvu'];
        $positiondetail->idchucnang = $input['idchucnang'];
        $positiondetail->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật thành công',
           'data' => new PositionDetailResource($positiondetail)
        ];
        return response()->json($arr, 200);
    }

    public function destroy(PositionDetail $positiondetail)
    {
        $positiondetail->delete();
        $arr = [
            'status' => true,
            'message' =>'Dữ liệu đã được xóa',
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
