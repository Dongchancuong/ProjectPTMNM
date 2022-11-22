<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Customer;
use App\Http\Resources\User as UserResource;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách tài khoản",
        'data'=>UserResource::collection($users)
        ];
        return response()->json($arr, 200);
    }

    public function newUser()
    {
        $empAcc = Employee::select('idtaikhoan')->whereNotNull('idtaikhoan')->get();
        $cusAcc = Customer::select('idtaikhoan')->whereNotNull('idtaikhoan')->get();
        $users = User::whereNotIn('idtaikhoan', $empAcc)->whereNotIn('idtaikhoan', $cusAcc)->get();
        $arr = [
        'status' => true,
        'message' => "Danh sách tài khoản tài khoản chưa được sử dụng",
        'data'=>UserResource::Collection($users)
        ];
        return response()->json($arr, 200);
    }

    public function getNewID()
    {
        $last_id = User::select('idtaikhoan')->orderBy('idtaikhoan', 'DESC')->first();
        $split_id = str_split($last_id['idtaikhoan'], 2);
        $newid = $split_id[1] + 1;
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
            'username' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }

        $query = User::where('username', '=', $request['username'])->get();
        if (!empty($query[0]->username)) {
            $arr = [
                'success' => false,
                'message' => 'Tên tài khoản bị trùng',
                'data' => []
              ];
              return response()->json($arr, 200);
        }
        
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $arr = [
            'status' => true,
            'message'=>"Thêm tài khoản thành công",
            'data'=> new UserResource($user)
        ];
        return response()->json($arr, 201);
    }

    public function update(Request $request, User $user)
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
        // $curAcc = User::select('idtaikhoan')->where('idtaikhoan', '=', auth()->user()->idtaikhoan)->get();
        // if (!empty($curAcc)) {
        //     $arr = [
        //         'status' => false,
        //         'message' => 'Tài khoản đang được sử dụng',
        //         'data' => []
        //     ];
        //     return response()->json($arr, 200);
        // } 
        $user = User::find($input['idtaikhoan']);
        $user->idchucvu = $input['idchucvu'];
        $user->save();
        $arr = [
           'status' => true,
           'message' => 'Sửa chức vụ thành công',
           'data' => new UserResource($user)
        ];
        return response()->json($arr, 200);
    }

    public function destroy($idtaikhoan)
    {
        $empAcc = Employee::select('idtaikhoan')->where('idtaikhoan', '=', $idtaikhoan)->get();
        $cusAcc = Customer::select('idtaikhoan')->where('idtaikhoan', '=', $idtaikhoan)->get();
        if (!empty($empAcc[0]->idtaikhoan) || !empty($cusAcc[0]->idtaikhoan)) {
            $status = false;
            $message = 'Tài khoản đang được sử dụng';
        } else {
            // $curAcc = User::select('idtaikhoan')->where('idtaikhoan', '=', auth()->user()->idtaikhoan)->get();
            // if (!empty($curAcc)) {
            //     $status = false;
            //     $message = 'Tài khoản đang được sử dụng';
            // } else 
            {
                User::find($idtaikhoan)->delete();
                $status = true;
                $message = 'Tài khoản đã được xóa';
            }
        }
        $arr = [
            'status' => $status,
            'message' => $message,
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
