<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Http\Resources\Position as PositionResource;


class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách chức vụ",
        'data'=>PositionResource::collection($positions)
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
            'tenchucvu' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $position = Position::create($input);
        $arr = ['status' => true,
           'message'=>"Thêm chức vụ thành công",
           'data'=> new PositionResource($position)
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

    public function update(Request $request, Position $position)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'idchucvu' => 'required',
            'tenchucvu' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $position->idchucvu = $input['idchucvu'];
        $position->tenchucvu = $input['tenchucvu'];
        $position->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật chức vụ thành công',
           'data' => new PositionResource($position)
        ];
        return response()->json($arr, 200);
    }

    public function destroy(Position $position)
    {
        $position->delete();
        $arr = [
            'status' => true,
            'message' =>'Chức vụ đã được xóa',
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
