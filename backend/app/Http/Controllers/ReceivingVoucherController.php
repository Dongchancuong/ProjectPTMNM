<?php

namespace App\Http\Controllers;

use App\Models\ReceivingVoucher;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecevivingVoucherRequest;
use App\Http\Resources\ReceivingVoucher as ResourceRE;
use App\Models\Product;
use App\Models\ReceivingVoucherDetail;

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
     * Display the specified resource.
     *
     * @param  \App\Models\ReceivingVoucher  $receivingVoucher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Detail= ReceivingVoucher::find($id);
        if (empty($Detail)) {
            $arr = [
            'status' => false,
            'message' => 'Không tìm thấy phiếu nhập hàng này',
        ];
            return response()->json($arr, 400);
        }
        $arr = [
            'status' => true,
            'message' => "Thông tin chi tiết phiếu nhập hàng",
            'data'=>$Detail->RVoucherDetail,  
        ];
            return response()->json($arr, 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecevivingVoucherRequest $request)
    {
        $re=$request->all();
        if(ReceivingVoucher::find($request->idpn)){
            $arr = [
                'status' => false,
                'message'=>"Mã nhập hàng này đã tồn tại",
            ];
            return response()->json($arr, 400);
        }
        $re['idpnh']=$request->idpnh;        
        $re['idnhanvien']=$request->idnhanvien;
        $re['idnhacungcap']=$request->idnhacungcap;
        ReceivingVoucher::create($re);        
        $redetail['idpnh']=$request->idpnh;            
        $redetail['idsanpham']=$request->idsanpham;
        $redetail['soluong']=$request->soluong;
        ReceivingVoucherDetail::create($redetail);
        $product=Product::find($request->idsanpham);
        if(!$product){
            $arr = [
                'status' => false,
                'message'=>"Không có mã sản phẩm này",
            ];
            return response()->json($arr, 400);
        }
        $product->soluong+=$request->soluong;
        $product->save();
        $arr = [
            'status' => true,
            'message'=>"Đã thêm phiếu nhập hàng thành công",
        ];
        return response()->json($arr, 201);
    }
}
