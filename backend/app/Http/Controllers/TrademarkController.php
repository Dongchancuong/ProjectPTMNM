<?php

namespace App\Http\Controllers;

use App\Models\Trademark;
use App\Http\Controllers\Controller;
use App\Http\Resources\Trademark as TrademarkResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrademarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Trademark = Trademark::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách thương hiệu",
        'data'=>TrademarkResource::collection($Trademark)
        ];
        return response()->json($arr, 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all(); 
        $input['visible']=1;
        $validator = Validator::make($input, [
            'idthuonghieu' => 'required',
            'tenthuonghieu' => 'required'            
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $trademark = Trademark::create($input);
        $arr = ['status' => true,
           'message'=>"Đã thêm thương hiệu thành công",
           'data'=> new TrademarkResource($trademark)
        ];
        return response()->json($arr, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trademark  $trademark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Cập nhật thương hiệu
        $input =Trademark::find($id);
        if (is_null($input)) {
            $arr = [
            'success' => false,
            'message' => 'Không có sản phẩm này',
            'data' => $input
            ];
            return response()->json($arr, 200);
        }
        $input['tenthuonghieu']=$request->tenthuonghieu;
        $input['visible']=$request->visible;
        $input->update();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật thành công',
           'data' => new TrademarkResource($input),
        ];
        return response()->json($arr, 200);
        
    }
     /**
     * Display the specified resource.
     *
     * @param  \App\Models\MachineType  $machineType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trademark  $trademark
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $input =Trademark::find($id);
        if (!$input) {
            $arr = [
            'success' => false,
            'message' => 'Không có sản phẩm này',
            'data' => []
            ];
            return response()->json($arr, 200);
        } 
        $input->visible='0';
        $input->update();
        $arr = [
           'status' => true,
           'message' => 'thương hiệu đã được ẩn thành công',
           'data' => new TrademarkResource($input),
        ];
        return response()->json($arr, 200);
    }
}
