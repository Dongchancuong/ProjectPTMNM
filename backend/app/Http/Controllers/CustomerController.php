<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Resources\Customer as CustomerResource;


class CustomerController extends Controller
{
    public function index()
    {
        $Customers = Customer::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách khách hàng",
        'data'=>CustomerResource::collection($Customers)
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
            'hoten' => 'required',
            'sdt' => 'required',
            'diachi' => 'required',
            'email' => 'nullable',
            'doanhso' => 'required',
            'capdo' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $customer = Customer::create($input);
        $arr = ['status' => true,
           'message'=>"Thêm khách hàng thành công",
           'data'=> new CustomerResource($customer)
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

    public function update(Request $request, Customer $customer)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'hoten' => 'required',
            'sdt' => 'required',
            'diachi' => 'required',
            'email' => 'nullable',
            'doanhso' => 'required',
            'capdo' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $customer->hoten = $input['hoten'];
        $customer->sdt = $input['sdt'];
        $customer->diachi = $input['diachi'];
        $customer->email = $input['email'];
        $customer->doanhso = $input['doanhso'];
        $customer->capdo = $input['capdo'];
        $customer->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật khách hàng thành công',
           'data' => new CustomerResource($customer)
        ];
        return response()->json($arr, 200);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        $arr = [
            'status' => true,
            'message' =>'Khách hàng đã được xóa',
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
