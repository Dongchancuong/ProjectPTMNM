<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\PositionDetail;
use App\Http\Resources\PositionDetail as PositionDetailResource;
use Illuminate\Support\Facades\DB;


class PositionDetailController extends Controller
{
    public function index(Request $request)
    {
        $positiondetails = PositionDetail::where('idchucvu', '=', $request['idchucvu'])->where('visible', '=', 1)->get();
        $arr = [
        'status' => true,
        'message' => "",
        'data'=>PositionDetailResource::collection($positiondetails)
        ];
        return response()->json($arr, 200);
    }

    //xem chi tiet
    public function detail()
    {
        $details = PositionDetail::all();
        $arr = [
        'status' => true,
        'message' => "",
        'data'=>PositionDetailResource::collection($details)
        ];
        return response()->json($arr, 200);
    }

    public function update(Request $request, PositionDetail $positiondetail)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'idchucvu' => 'required',
            'idchucnang' => 'required',
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
        $positiondetail->idchucvu = $input['idchucvu'];
        $positiondetail->tenchucvu = $input['tenchucvu'];
        $positiondetail->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật chức vụ thành công',
           'data' => new PositionDetailResource($positiondetail)
        ];
        return response()->json($arr, 200);
    }
}
