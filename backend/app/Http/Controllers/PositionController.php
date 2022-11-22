<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PositionDetailController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Account;
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
        (new PositionDetailController)->newDetail($input['idchucvu']);
        $arr = ['status' => true,
           'message'=>"Thêm chức vụ thành công",
           'data'=> new PositionResource($position),
        ];
        return response()->json($arr, 201);
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
        $position = Position::find($input['idchucvu']);
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
        $input = $request->all();
        $validator = Validator::make($input, [
            'idchucvu' => 'required',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }

        if ($input['idchucvu'] === 'QL') {
            $arr = [
                'status' => false,
                'message' => 'Không được xóa chức vụ này',
                'data' => [],
            ];
            return response()->json($arr, 200);
        }

        $query = Account::select('idchucvu')->where('idchucvu', '=', $input['idchucvu'])->get();
        if (!empty($query[0]->idchucvu)) {
            $status = false;
            $message = 'Chức vụ đang được sử dụng';
        }
        else {
            (new PositionDetailController)->destroy($request['idchucvu']);
            Position::where('idchucvu', $request['idchucvu'])->delete();
            $status = true;
            $message = 'Chức vụ đã được xóa';
        }
        $arr = [
            'status' => $status,
            'message' => $message,
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
