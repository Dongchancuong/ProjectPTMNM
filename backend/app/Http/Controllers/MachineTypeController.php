<?php

namespace App\Http\Controllers;

use App\Models\MachineType;
use App\Http\Controllers\Controller;
use App\Http\Resources\MachineType as MachineTypeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MachineTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $machineType= MachineType::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách loại máy",
        'data'=>MachineTypeResource::collection($machineType)
        ];
        return response()->json($arr, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'idloaimay' => 'required',
            'tenloaimay' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $machineType = MachineType::create($input);
        $arr = ['status' => true,
           'message'=>"Loại máy được thêm thành công",
           'data'=> new MachineTypeResource($machineType)
        ];
        return response()->json($arr, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MachineType  $machineType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $input =MachineType::find($id);
        if (is_null($input)) {
            $arr = [
            'success' => false,
            'message' => 'Không tìm thấy loại máy này',
            'data' => $input,
            ];
            return response()->json($arr, 200);
        }
        $arr = [
           'status' => true,
           'message' => 'Dã tìm thấy loại máy cần tìm',
           'data' => new MachineTypeResource($input),
        ];
        return response()->json($arr, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MachineType  $machineType
     * @return \Illuminate\Http\Response
     */
    public function update(MachineType $request,$id)
    {
        $input =MachineType::find($id);
        if (is_null($input)) {
            $arr = [
            'success' => false,
            'message' => 'Không có sản phẩm này',
            'data' => $input
            ];
            return response()->json($arr, 200);
        }
        $input['tenloaimay']=$request->tenlloaimay;
        $input['visible']=$request->visible;
        $input->update();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật thành công',
           'data' => new MachineTypeResource($input),
        ];
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MachineType  $machineType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input =MachineType::find($id);
        if (!$input) {
            $arr = [
            'success' => false,
            'message' => 'Không có sản phẩm này',
            'data' => []
            ];
            return response()->json($arr, 200);
        } 
        $input->visible='0';
        $input->save();
        $arr = [
           'status' => true,
           'message' => 'Loại máy đã được ẩn thành công',
           'data' => new MachineTypeResource($input),
        ];
        return response()->json($arr, 200);
    }
}
