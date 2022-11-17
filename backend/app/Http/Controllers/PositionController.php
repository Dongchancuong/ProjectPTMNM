<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Http\Resources\Position as PositionResource;


class PositionController extends Controller
{
    public function index(Request $request)
    {
        $positions = Position::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách chức vụ",
        'data'=>PositionResource::collection($positions)
        ];
        return response()->json($arr, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all(); 
        $validator = Validator::make($input, [
            'idchucvu' => 'required',
            'tenchucvu' => 'required',
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }

        $position = new PositionResource;
        $position->idchucvu = $input['idchucvu'];
        $position->tenchucvu = $input['tenchucvu'];
        $position->created_at = $input['created_at'];
        $position->updated_at = $input['updated_at'];
        $query = Position::insert([
            ['idchucvu' => $position->idchucvu, 'tenchucvu' => $position->tenchucvu, 'created_at' => $position->created_at, 'updated_at' => $position->updated_at]
        ]);
        
        if ($query->fail()){
            $arr = ['status' => false,
            'message'=>"Truy vấn thất bại",
            ];
        return response()->json($arr, 200);
        }
        else {
            $arr = ['status' => true,
            'message'=>"Thêm chức vụ thành công",
            'data'=> new PositionResource($position),
            ];
        return response()->json($arr, 201);}
    }

    public function update(Request $request, Position $position)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'idchucvu' => 'required',
            'tenchucvu' => 'required',
            'updated_at' => 'required'
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

    public function destroy(Request $request)
    {
        $arr = [
            'status' => true,
            'message' =>'Chức vụ đã được xóa',
            'data' => Position::where('idchucvu', '=', $request['idchucvu'])->update(['visible' => 0]),
        ];
        return response()->json($arr, 200);
    }
}
