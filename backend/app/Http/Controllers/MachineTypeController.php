<?php

namespace App\Http\Controllers;

use App\Models\MachineType;
use App\Http\Controllers\Controller;
use App\Http\Requests\MachineTypeRequest;
use App\Http\Resources\MachineType as MachineTypeResource;

class MachineTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machineType= MachineType::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách loại máy",
        'data'=>MachineTypeResource::collection($machineType)
        ];
        return response()->json($arr, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MachineTypeRequest $request)
    {
        //
        $input = $request->all(); 
        if(MachineType::find($request->idloaimay)){
            $arr = [
                'status' => false,
                'message'=>"Mã loại máy đã tồn tại",
            ];
            return response()->json($arr, 400);
        }
        MachineType::create($input);
        $arr = [
            'status' => true,
            'message'=>"Loại máy được thêm thành công",
        ];
        return response()->json($arr, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MachineType  $machineType
     * @return \Illuminate\Http\Response
     */
    public function update(MachineTypeRequest $request,$id)
    {
        $input =MachineType::find($id);
        if (is_null($input)) {
            $arr = [
            'success' => false,
            'message' => 'Không tìm thấy loại máy này',
            ];
            return response()->json($arr, 400);
        }
        $input->idloaimay=$request->idloaimay;
        $input->tenloaimay=$request->tenloaimay;
        $input->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật thành công',
        ];
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MachineType  $machineType
     * @return \Illuminate\Http\Response
     */
    public function Hide($id)
    {
        $input =MachineType::find($id);
        if (!$input) {
            $arr = [
            'success' => false,
            'message' => 'Không tìm thấy loại máy này',
            ];
            return response()->json($arr, 400);
        } 
        $input->visible='0';
        $input->save();
        $arr = [
           'status' => true,
           'message' => 'Loại máy này đã được ẩn thành công',
        ];
        return response()->json($arr, 200);
    }
}
