<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Http\Resources\Material as MaterialResource;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function store(MaterialRequest $request)
    {
        //
        $input = $request->all(); 
        if(Material::find($request->idchatlieu)){
            $arr = [
                'status' => false,
                'message'=>"Mã chất liệu này đã tồn tại",
            ];
            return response()->json($arr, 400);
        }
        $material = Material::create($input);
        $arr = ['status' => true,
           'message'=>"Chất liệu được thêm thành công",
           'data'=> new MaterialResource($material)
        ];
        return response()->json($arr, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(MaterialRequest $request,$id)
    {
        $input =Material::find($id);
        if(!$input){
            $arr= [
                'status' => false,
                'message' => 'Không tìm thấy chất liệu này',
            ];
            return response()->json($arr, 400);
        }
        $input['tenchatlieu']=$request->tenchatlieu;
        $input['idchatlieu']=$request->idchatlieu;
        $input->save();
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
    public function Hide($id)
    {
        $input =Material::find($id);
        if (!$input) {
            $arr = [
            'success' => false,
            'message' => 'Không có chất liệu này',
            ];
            return response()->json($arr, 400);
        } 
        $input->visible='0';
        $input->update();
        $arr = [
           'status' => true,
           'message' => 'Chất liệu đã được ẩn thành công',
        ];
        return response()->json($arr, 200);
    }
}
