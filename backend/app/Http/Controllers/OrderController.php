<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Resources\Order as OrderResource;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách phiếu đặt hàng",
        'data'=>OrderResource::collection($orders)
        ];
        return response()->json($arr, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all(); 
        $validator = Validator::make($input, [
            'idphieudh' => 'required',
            'idkhuyenmai' => 'nullable',
            'hoten' => 'required',
            'sdt' => 'required',
            'email' => 'nullable',
            'diachi' => 'required',
            'tonggia' => 'required',
            'ngaylap' => 'required',
            'tinhtrang' => 'required',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $order = Order::create($input);
        $arr = ['status' => true,
           'message'=>"Thêm phiếu đặt hàng thành công",
           'data'=> new OrderResource($order)
        ];
        return response()->json($arr, 201);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'idkhuyenmai' => 'nullable',
            'hoten' => 'required',
            'sdt' => 'required',
            'email' => 'nullable',
            'diachi' => 'required',
            'tonggia' => 'required',
            'ngaylap' => 'required',
            'tinhtrang' => 'required',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $order->idphieudh = $input['idphieudh'];
        $order->idkhuyenmai = $input['idkhuyenmai'];
        $order->hoten = $input['hoten'];
        $order->sdt = $input['sdt'];
        $order->email = $input['email'];
        $order->diachi = $input['diachi'];
        $order->tonggia = $input['tonggia'];
        $order->ngaylap = $input['ngaylap'];
        $order->tinhtrang = $input['tinhtrang'];
        $order->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật phiếu đặt hàng thành công',
           'data' => new OrderResource($order)
        ];
        return response()->json($arr, 200);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        $arr = [
            'status' => true,
            'message' =>'Phiếu đặt hàng đã được xóa',
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
