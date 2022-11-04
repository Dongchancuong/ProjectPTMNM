<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Resources\Employee as EmployeeResource;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách nhân viên",
        'data'=>EmployeeResource::collection($employees)
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
          'idnhanvien' => 'required',
          'idtaikhoan' => 'required',
          'hoten' => 'required', 
          'gioitinh' => 'required',
          'ngaysinh' => 'required',
          'sdt' => 'required',
          'diachi' => 'nullable',
          'email' => 'nullable',
          'ngayvaolam' => 'required',
          'luong' => 'required',
          'created_at' => 'nullable',
          'updated_at' => 'nullable',

        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $employee = Employee::create($input);
        $arr = ['status' => true,
           'message'=>"Thêm nhân viên thành công",
           'data'=> new EmployeeResource($employee)
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

    public function update(Request $request, Employee $employee)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
          'idnhanvien' => 'required',
          'idtaikhoan' => 'nullable',
          'hoten' => 'required', 
          'gioitinh' => 'required',
          'ngaysinh' => 'required',
          'sdt' => 'required',
          'diachi' => 'nullable',
          'email' => 'nullable',
          'ngayvaolam' => 'required',
          'luong' => 'required',
          'created_at' => 'nullable',
          'updated_at' => 'nullable',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $employee->hoten = $input['hoten'];
        $employee->gioitinh = $input['gioitinh'];
        $employee->ngaysinh = $input['ngaysinh'];
        $employee->sdt = $input['sdt'];
        $employee->diachi = $input['diachi'];
        $employee->email = $input['email'];
        $employee->ngayvaolam = $input['ngayvaolam'];
        $employee->luong = $input['luong'];
        $employee->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật nhân viên thành công',
           'data' => new EmployeeResource($employee)
        ];
        return response()->json($arr, 200);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        $arr = [
            'status' => true,
            'message' =>'Nhân viên đã được xóa',
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
