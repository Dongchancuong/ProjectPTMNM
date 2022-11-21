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
        $detail = ProductDetail::where('idsanpham', '=', $idsp)->get();
        $arr = [
        'status' => true,
        'message' => "Danh sách tài khoản",
        'data'=>ProductDetailResource::collection($detail)
        ];
        return response()->json($arr, 200);
    }
}
