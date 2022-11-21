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

    public function newDetail($idchucvu)
    {
        $functionlist = (DB::table('chucnang')->select()->get())->all();
        foreach ($functionlist as $data) {
            PositionDetail::create([
                'idchucvu' => $idchucvu,
                'idchucnang' => $data->idchucnang
            ]);
        }
    }

    public function update(Request $request, PositionDetail $positiondetail)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'idchucvu' => 'required',
            'idchucnang' => 'required',
            'visible' => 'required',
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
        $positiondetail->visible = $input['visible'];
        if (PositionDetail::where('idchucvu', $input['idchucvu'])->where('idchucnang', $input['idchucnang'])->update(['visible' => 0]))
        $arr = [
           'status' => true,
           'message' => 'Cập nhật chức vụ thành công',
           'data' => new PositionDetailResource($positiondetail)
        ];
        else
        $arr = [
            'status' => false,
            'message' => 'Cập nhật chức vụ thất bại',
            'data' => []
         ];
        return response()->json($arr, 200);
    }

    public function destroy($idchucvu)
    {
        PositionDetail::where('idchucvu', $idchucvu)->delete();
        $arr = [
            'status' => true,
            'message' => 'Xóa chi tiết chức vụ thành công',
            'data' => ""
         ];
         return response()->json($arr, 200);
    }
}
