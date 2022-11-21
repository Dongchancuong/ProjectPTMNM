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
        $employees = Employee::where('visible', '=', 1)->get();
        $arr = [
        'status' => true,
        'message' => "Danh sách nhân viên",
        'data'=>EmployeeResource::collection($employees)
        ];
        return response()->json($arr, 200);
    }

    public function getNewID()
    {
        $last_id = Employee::select('idnhanvien')->orderBy('idnhanvien', 'DESC')->first();
        $split_id = str_split($last_id['idnhanvien'], 2);
        $newid = $split_id[1] + 1;
        if ($newid < 10) $idnv= "NV0".$newid;
        else $idnv = "NV".$newid;
        $arr = [
        'status' => true,
        'message' => "Số ID mới nhất",
        'data'=> "NV".$newid
        ];
        return response()->json($arr, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all(); 
        $validator = Validator::make($input, [
          'idnhanvien' => 'required',
          'idtaikhoan' => 'nullable',
          'hoten' => 'required', 
          'gioitinh' => 'required',
          'ngaysinh' => 'required',
          'sdt' => 'required',
          'diachi' => 'required',
          'email' => 'required',
          'ngayvaolam' => 'required',
          'luong' => 'required',
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
          'diachi' => 'required',
          'email' => 'required',
          'ngayvaolam' => 'required',
          'luong' => 'required',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $employee = Employee::find($input['idnhanvien']);
        if (!is_null($input['idtaikhoan'])) 
        $employee->idtaikhoan = $input['idtaikhoan'];
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


  public function destroy($idnhanvien)
  {
        // $input = $request->all();
        // $validator = Validator::make($input, [
        //     'idnhanvien' => 'required', 
        // ]);
        // if($validator->fails()){
        //   $arr = [
        //     'success' => false,
        //     'message' => 'Lỗi kiểm tra dữ liệu',
        //     'data' => $validator->errors()
        //   ];
        //   return response()->json($arr, 200);
        // }
        $employee = Employee::find($idnhanvien);
        $employee->idtaikhoan = null;
        $employee->visible = 0;
        $employee->save();
        $arr = [
            'status' => true,
            'message' =>'Nhân viên đã được xóa',
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
