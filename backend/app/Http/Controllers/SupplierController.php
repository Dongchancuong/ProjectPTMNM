<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Resources\Supplier as SupplierResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supplier = Supplier::all();
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
    public function store(Request $request)
    {
        //Cập nhập danh sách
        $input = $request->all(); 
        $validator = Validator::make($input, [
            'idnhacungcap' => 'required',
            'tennhacungcap' => 'required',
            'diachi'=> 'required',
            'email'=> 'required|email',
            'sdt'=> 'required',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $supplier= Supplier::create($input);
        $arr = ['status' => true,
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
    public function update($id)
    {
        //
        $input =Supplier::find($id);
        $validator=Validator::make($input,[
                'tennhacungcap' => 'required',
                'diachi' => 'required', 
                'sdt' => 'required',
                'email' => 'required|email',
                'visible' => 'required', 
        ]);
        if ($validator->fails()) {
            $arr = [
            'success' => false,
            'message' => 'Không có sản phẩm này',
            'data' => $validator->errors()
            ];
            return response()->json($arr, 200);
        }
        $input['tennhacungcap']=$input->tennhacungcap;
        $input['diachi']=$input->diachi;
        $input['email']=$input->email;
        $input['sdt']=$input->sdt;
        $input['visible']=$input->visible;
        $input->update();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật thành công',
           'data' => new Supplier($input),
        ];
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $input =Supplier::find($id);
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
           'message' => 'nhà cung cấp đã được ẩn thành công',
           'data' => new SupplierResource($input),
        ];
        return response()->json($arr, 200);
    }
    
}
