<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Employee;
use App\Models\Customer;
use App\Http\Resources\Account as AccountResource;


class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách tài khoản",
        'data'=>AccountResource::collection($accounts)
        ];
        return response()->json($arr, 200);
    }

    public function newAccount()
    {
        $empAcc = Employee::pluck('idtaikhoan')->all();
        $cusAcc = Customer::pluck('idtaikhoan')->all();
        $accounts = Account::whereNotIn('idtaikhoan', $empAcc)->whereNotIn('idtaikhoan', $cusAcc)->get();
        $arr = [
        'status' => true,
        'message' => "Danh sách tài khoản tài khoản chưa được sử dụng",
        'data'=>AccountResource::Collection($accounts)
        ];
        return response()->json($arr, 200);
    }

    public function getNewID()
    {
        $last_id = Account::select('idtaikhoan')->orderBy('idtaikhoan', 'DESC')->first();
        $split_id = str_split($last_id['idtaikhoan'], 2);
        $newid = $split_id['1'] + 1;
        if ($newid < 10) $idtk = "TK0".$newid;
        else $idtk = "TK".$newid;
        return $idtk;
    }

    public function store(Request $request)
    {
        $request['idtaikhoan'] = $this->getNewID();
        $input = $request->all(); 
        $validator = Validator::make($input, [
            'idtaikhoan' => 'required',
            'idchucvu' => 'required',
            'tentaikhoan' => 'required',
            'matkhau' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $account = Account::create($input);
        $arr = [
            'status' => true,
            'message'=>"Thêm tài khoản thành công",
             'data'=> new AccountResource($account)
        ];
        return response()->json($arr, 201);
    }

    public function update(Request $request, Account $account)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'idtaikhoan' => 'required',
            'idchucvu' => 'required',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $account = Account::find($input['idtaikhoan']);
        $account->idchucvu = $input['idchucvu'];
        $account->save();
        $arr = [
           'status' => true,
           'message' => 'Sửa chức vụ thành công',
           'data' => new AccountResource($account)
        ];
        return response()->json($arr, 200);
    }

    public function destroy(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'idtaikhoan' => 'required',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $empAcc = Employee::select('idtaikhoan')->where('idtaikhoan', '=', $input['idtaikhoan'])->get();
        $cusAcc = Customer::select('idtaikhoan')->where('idtaikhoan', '=', $input['idtaikhoan'])->get();
        if (!empty($empAcc[0]->idtaikhoan) || !empty($cusAcc[0]->idtaikhoan)) {
            $status = false;
            $message = 'Tài khoản đã được sử dụng';
        }
        else {
            Account::find($input['idtaikhoan'])->delete();
            $status = true;
            $message = 'Tài khoản đã được xóa';
        }
        $arr = [
            'status' => $status,
            'message' => $message,
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
