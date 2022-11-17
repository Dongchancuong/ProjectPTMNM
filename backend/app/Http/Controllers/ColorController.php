<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Controllers\Controller;
use App\Http\Resources\Color as ColorResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function store(Request $request)
    {
        //
        $input = $request->all(); 
        $validator = Validator::make($input, [
            'idmau' => 'required',
            'tenmau' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $color = Color::create($input);
        $arr = ['status' => true,
           'message'=>"Màu sắc được thêm thành công",
           'data'=> new ColorResource($color)
        ];
        return response()->json($arr, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $input =Color::find($id);
        if (is_null($input)) {
            $arr = [
            'success' => false,
            'message' => 'Không có màu sắc này',
            'data' => $input
            ];
            return response()->json($arr, 200);
        }
        $arr = [
           'status' => true,
           'message' => 'Thông tin màu sắc sau khi tìm kiếm',
           'data' => new ColorResource($input),
        ];
        return response()->json($arr, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $input =Color::find($id);
        if(!$input){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $input
           ];
           return response()->json($arr, 200);
        }
        $input['tenmau']=$request->tenmau;
        $input['visible']=$request->visible;
        $input->update();
        $arr = [
           'status' => true,
           'message' => 'Màu sắc đã được cập nhật thành công',
           'data' => new ColorResource($input)
        ];
        return response()->json($arr, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $input =Color::find($id);
        if(!$input){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $input
           ];
           return response()->json($arr, 200);
        }
        $input['visible']=0;
        $input->update();
        $arr = [
           'status' => true,
           'message' => ' Màu sắc đã được ẩn thành công',
           'data' => new ColorResource($input)
        ];
        return response()->json($arr, 201);
    }
}
