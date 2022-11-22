<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Http\Resources\Supplier as SupplierResource;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all()->sortByDesc('timestamp');
        $arr = [
        'status' => true,
        'message' => "Danh sách nhà cung cấp",
        'data'=>SupplierResource::collection($supplier)
        ];
        return response()->json($arr, 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        //Cập nhập danh sách
        $input = $request->all(); 
        if(Supplier::find($request->idnhacungcap)){
            $arr = [
                'status' => false,
                'message'=>"Mã nhà cung cấp này đã tồn tại",
            ];
            return response()->json($arr, 400);
        }
        $supplier= Supplier::create($input);
        $arr = [
            'status' => true,
            'message'=>"Nhà cung cấp được thêm thành công",
            'data'=> new SupplierResource($supplier),
        ];
        return response()->json($arr, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request,$id)
    {
        $input =Supplier::find($id);
        if (!$input) {
            $arr = [
            'success' => false,
            'message' => 'Không tìm thấy nhà cung cấp này',
            ];
            return response()->json($arr, 400);
        } 
        $input->idnhacungcap=$request->idnhacungcap;
        $input->tennhacungcap=$request->tennhacungcap;
        $input->email=$request->email;
        $input->diachi=$request->diachi;
        $input->email=$request->email;
        $input->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật thành công',
           'data' => new SupplierResource($input),
        ];
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function Hide($id)
    {
        $input =Supplier::find($id);
        if (!$input) {
            $arr = [
            'success' => false,
            'message' => 'Không tìm thấy nhà cung cấp này',
            ];
            return response()->json($arr, 400);
        } 
        $input->visible='0';
        $input->save();
        $arr = [
           'status' => true,
           'message' => 'Nhà cung cấp đã được ẩn thành công',
           'data' => new SupplierResource($input),
        ];
            return response()->json($arr, 200);
    }
    
}
