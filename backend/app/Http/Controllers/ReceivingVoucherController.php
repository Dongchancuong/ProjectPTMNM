<?php

namespace App\Http\Controllers;

use App\Models\ReceivingVoucher;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReceivingVoucher as ResourceRE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReceivingVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ReceivingVoucher = ReceivingVoucher::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách phiếu nhập hàng",
        'data'=>ResourceRE::collection($ReceivingVoucher)
        ];
        return response()->json($arr, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all(); 
        $input['visible']=1;
        $validator = Validator::make($input, [
            'idpnh' => 'required',
            'idnhanvien' => 'required' ,           
            'idnhacungcap' => 'required',         
            'id' => 'required',
            'idnhanvien' => 'required' ,           
            'idnhacungcap' => 'required',   
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $trademark = ReceivingVoucher::create($input);
        $arr = ['status' => true,
           'message'=>"Đã thêm thương hiệu thành công",
           'data'=> new ResourceRE($trademark)
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceivingVoucher  $receivingVoucher
     * @return \Illuminate\Http\Response
     */
    public function show(ReceivingVoucher $receivingVoucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceivingVoucher  $receivingVoucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceivingVoucher $receivingVoucher)
    {
        //
    }
}
