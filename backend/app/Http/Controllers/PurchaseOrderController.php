<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseOrder as POrderResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $purchaseOrder = PurchaseOrder::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách phiếu đặt hàng",
        'data'=>POrderResource::collection($purchaseOrder)
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
            'idphieudh' => 'required',
            'idsanpham' => 'required',
            'hoten' => 'required',
            'sdt' => 'required',
            'email' => 'required|email',
            'tonggia' => 'required',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $purchaseOrder = PurchaseOrder::create($input);
        $arr = ['status' => true,
           'message'=>"Phiếu đặt hàng được thêm thành công",
           'data'=> new POrderResource($purchaseOrder)
        ]; return response()->json($arr, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $input =PurchaseOrder::find($id);
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
           'data' => new POrderResource($input),
        ];
        return response()->json($arr, 200);
    }
}
