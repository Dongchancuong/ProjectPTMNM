<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Http\Resources\Account as AccountResource;


class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::where('visible', '=', 1)->get();
        $arr = [
        'status' => true,
        'message' => "Danh sách tài khoản",
        'data'=>AccountResource::collection($accounts)
        ];
        return response()->json($arr, 200);
    }

    public function getNewID($type)
    {
        $last_id = Account::where('idtaikhoan', 'like', '%'.$type.'%')->select('idtaikhoan')->orderBy('idtaikhoan', 'DESC')->first();
        $split_id = str_split($last_id['idtaikhoan'], 5);
        $newid = $split_id['1'] + 1;
        if ($type === "NV") 
            if ($newid < 10) $idtk = "TK_NV0".$newid;
            else $idtk = "TK_NV".$newid;
        else 
            if ($newid < 10) $idtk = "TK_KH0".$newid;
            else $idtk = "TK_KH".$newid;
        return $idtk;
    }

    public function store(Request $request, $type)
    {
        $request['idtaikhoan'] = $this->getNewID($type);
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
        $arr = ['status' => true,
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
            'tentaikhoan' => 'required',
            'matkhau' => 'required',
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
        $account->tentaikhoan = $input['tentaikhoan'];
        $account->matkhau = $input['matkhau'];
        $account->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật tài khoản thành công',
           'data' => new AccountResource($account)
        ];
        return response()->json($arr, 200);
    }

    public function destroy(Request $request, Account $account)
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
        $account = Account::find($input['idtaikhoan']);
        $account->visible = 0;
        $account->save();
        $arr = [
            'status' => true,
            'message' =>'Tài khoản đã được xóa',
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
