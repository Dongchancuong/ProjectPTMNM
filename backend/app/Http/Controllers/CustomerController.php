<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Resources\Customer as CustomerResource;


class CustomerController extends Controller
{
    public function index()
    {
        $Customers = Customer::where('visible', '=', 1)->get();
        $arr = [
        'status' => true,
        'message' => "Danh sách khách hàng",
        'data'=>CustomerResource::collection($Customers)
        ];
        return response()->json($arr, 200);
    }

    public function getNewID()
    {
        $last_id = Customer::select('idkhachhang')->orderBy('idkhachhang', 'DESC')->first();
        $split_id = str_split($last_id['idkhachhang'], 2);
        $newid = $split_id['1'] + 1;
        if ($newid < 10) $idkh= "KH0".$newid;
        else $idkh = "KH".$newid;
        return $idkh;
    }

    public function store(Request $request)
    {
        $request['idkhachhang'] = $this->getNewID();
        $result = json_decode((new AccountController)->store($request)->getContent(), true);
        // $account = json_decode(Route::, true); //Goi bang router ?
        $request['idtaikhoan'] = $result['data']['idtaikhoan'];
        $input = $request->all(); 
        $validator = Validator::make($input, [
            'idkhachhang' => 'required',
            'idtaikhoan' => 'required',
            'hoten' => 'required',
            'sdt' => 'required',
            'diachi' => 'required',
            'email' => 'required',
            'tichly' => 'required',
            'capdo' => 'required',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        try{
            $customer = Customer::create($input);
        } catch (QueryException $exception) {
            (new AccountController)->destroy($request['idtaikhoan']);
            return false;
        }
        $arr = ['status' => true,
           'message'=>"Thêm khách hàng thành công",
           'data'=> new CustomerResource($customer)
        ];
        return response()->json($arr, 201);
    }

    public function update(Request $request, Customer $customer)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'idkhachhang' => 'required',
            'idtaikhoan' => 'required',
            'hoten' => 'required',
            'sdt' => 'required',
            'diachi' => 'required',
            'email' => 'required',
            'tichly' => 'required',
            'capdo' => 'required',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $customer = Customer::find($input['idkhachhang']);
        $customer->idtaikhoan = $input['idtaikhoan'];
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

    public function destroy(Request $request, Customer $customer)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'idkhachhang' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $customer = Customer::find($input['idkhachhang']);
        $customer->idtaikhoan = null;
        $customer->visible = 0;
        $customer->save();
        $arr = [
            'status' => true,
            'message' =>'Khách hàng đã được xóa',
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
