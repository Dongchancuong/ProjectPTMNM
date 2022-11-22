<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Http\Resources\Color as ColorResource;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $color=Color::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách màu sắc",
        'data'=>ColorResource::collection($color)
        ];
        return response()->json($arr, 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequest $request)
    {
        $input = $request->all(); 
        if(Color::find($request->idmau)){
            $arr = [
            'status' => false,
            'message'=>"Đã Có mã màu này trong danh sách",
         ];
         return response()->json($arr, 400); 
        }
        $color = Color::create($input);
        $arr = [
            'status' => true,
            'message'=>"Màu sắc được thêm thành công",
            'data'=> new ColorResource($color)
        ];
        return response()->json($arr, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(ColorRequest $request,$id)
    {
        $input =Color::find($id);
        if(!$input){
           $arr = [
             'success' => false,
             'message' => 'không tìm thấy mã màu này',
           ];
           return response()->json($arr, 400);
        }
        $input->idmau=$request->idmau;
        $input->tenmau=$request->tenmau;
        $input->save();
        $arr = [
           'status' => true,
           'message' => 'Màu sắc đã được cập nhật thành công',
           'data' => new ColorResource($input)
        ];
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function Hide($id)
    {
        $input =Color::find($id);
        if(!$input){
           $arr = [
             'success' => false,
             'message' => 'không tìm thấy mã màu này',
             'data' => $input
           ];
           return response()->json($arr, 400);
        }
        $input['visible']=0;
        $input->update();
        $arr = [
           'status' => true,
           'message' => 'Màu sắc đã được ẩn thành công',
           'data' => new ColorResource($input)
        ];
        return response()->json($arr, 200);
    }
}
