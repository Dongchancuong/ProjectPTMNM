<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Http\Controllers\Controller;
use App\Http\Resources\Material as MaterialResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $material = Material::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách chất liệu",
        'data'=>MaterialResource::collection($material)
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
            'idchatlieu' => 'required',
            'tenchatlieu' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $material = Material::create($input);
        $arr = ['status' => true,
           'message'=>"Chất liệu được thêm thành công",
           'data'=> new MaterialResource($material)
        ];
        return response()->json($arr, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $input =Material::find($id);
        if (is_null($input)) {
            $arr = [
            'success' => false,
            'message' => 'Không tìm thấy chất liệu này',
            'data' => $input
            ];
            return response()->json($arr, 200);
        }
        $arr = [
           'status' => true,
           'message' => 'Chất liệu sau khi tìm kiếm',
           'data' => new MaterialResource($input),
        ];
        return response()->json($arr, 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input =Material::find($id);
        if (is_null($input)) {
            $arr = [
            'success' => false,
            'message' => 'Không có chất liệu này',
            'data' => $input
            ];
            return response()->json($arr, 200);
        }
        $input['tenchatlieu']=$request->tenchatlieu;
        $input['visible']=$request->visible;
        $input->update();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật thành công',
           'data' => new MaterialResource($input),
        ];
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $input =Material::find($id);
        if (!$input) {
            $arr = [
            'success' => false,
            'message' => 'Không có chất liệu này',
            'data' => []
            ];
            return response()->json($arr, 200);
        } 
        $input->visible='0';
        $input->update();
        $arr = [
           'status' => true,
           'message' => 'Chất liệu đã được ẩn thành công',
           'data' => new MaterialResource($input),
        ];
        return response()->json($arr, 200);
    }
}
