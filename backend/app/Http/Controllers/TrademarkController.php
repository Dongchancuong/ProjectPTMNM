<?php

namespace App\Http\Controllers;

use App\Models\Trademark;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrademaskRequest;
use App\Http\Resources\Trademark as TrademarkResource;
use Illuminate\Http\Request;

class TrademarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Trademark = Trademark::all()->sortByDesc('timestamp');;
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
        $input = $request->all(); 
        if(Trademark::find($request->idthuonghieu)){
            $arr = [
                'status' => false,
                'message'=>"Mã thương hiệu này đã tồn tại",
            ];
            return response()->json($arr, 400);
        }
        $trademark = Trademark::create($input);
        $arr = [
            'status' => true,
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
                'message' => 'Không có thương hiệu này',
            ];
            return response()->json($arr, 400);
        }
        $input['tenthuonghieu']=$request->tenthuonghieu;
        $input['visible']=$request->visible;
        $input->update();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật thương hiệu thành công',
           'data' => new TrademarkResource($input),
        ];
        return response()->json($arr, 200);
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trademark  $trademark
     * @return \Illuminate\Http\Response
     */
    public function Hide($id)
    {
        //
        $input =Trademark::find($id);
        if (!$input) {
            $arr = [
            'success' => false,
            'message' => 'Không có thương hiệu này',
            ];
            return response()->json($arr, 400);
        } 
        $input->visible='0';
        $input->update();
        $arr = [
           'status' => true,
           'message' => 'Thương hiệu này đã được ẩn thành công',
           'data' => new TrademarkResource($input),
        ];
        return response()->json($arr, 200);
    }
}
