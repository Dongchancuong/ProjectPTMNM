<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Http\Resources\ProductDetail as ProductDetailResource;

class ProductDetailController extends Controller
{
    public function show($idsp)
    {
        $detail = ProductDetail::select('idsanpham', 'tenthuonghieu', 'tenmau', 'tenloaimay', 'tenchatlieu', 'gioitinh', 'xuatxu', 'mota', 'anh')
        ->join('thuonghieu', 'thuonghieu.idthuonghieu', '=', 'chitiet_sanpham.idthuonghieu')
        ->join('mausac', 'mausac.idmau', '=', 'chitiet_sanpham.idmau')
        ->join('loaimay', 'loaimay.idloaimay', '=', 'chitiet_sanpham.idloaimay')
        ->join('chatlieu', 'chatlieu.idchatlieu', '=', 'chitiet_sanpham.idchatlieu')
        ->where('idsanpham', '=', $idsp)->get();
        $arr = [
        'status' => true,
        'message' => "Chi tiết sản phẩm",
        'data'=> $detail
        ];
        return response()->json($arr, 200);
    }
}
