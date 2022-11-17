<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductDetail as PDetailResource;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all()->sortByDesc('timestamp');
        $arr = [
        'status' => true,
        'message' => "Danh sách sản phẩm",
        'data'=>ProductResource::collection($product)
        ];
        return response()->json($arr, 200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'idsanpham'=>$request->idsanpham, 
            'idkhuyenmai'=>$request->idkhuyenmai,
            'idnhacungcap'=>$request->idnhacungcap,
            'tensanpham'=>$request->tensanpham,
            'soluong'=>$request->soluong,
            'dongia'=>$request->dongia,
        ]);
        $product->ProductDetail()->create([
            'idsanpham'=>$request->idsanpham,
            'idthuonghieu'=>$request->idthuonghieu,
            'idmau'=>$request->idmau,
            'idloaimay'=>$request->idloaimay,
            'idchatlieu'=>$request->idchatlieu,
            'gioitinh'=>$request->gioitinh,
            'xuatxu'=>$request->xuatxu,
            'mota'=>$request->mota,
            'anh'=>$request->anh
        ]);
        $arr = [
            'status' => true,
            'message'=>"Sản phẩm được thêm thành công",
            'data'=> new ProductResource($product),
        ];
        return response()->json($arr, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('ProductDetail')->find($id);
        if (empty($product)) {
            $arr = [
            'success' => false,
            'message' => 'Không có sản phẩm này',
            'data' => []
            ];
            return response()->json($arr, 200);
        }
        $arr = [
            'status' => true,
            'message' => "Chi tiết sản phẩm",
            'data'=> new ProductResource($product),
            'datadetail'=> new PDetailResource($product->ProductDetail),
            ];
        return response()->json($arr, 201);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = Product::with('ProductDetail')->find($id);
            $product->idkhuyenmai=$request->idkhuyenmai;
            $product->idnhacungcap=$request->idnhacungcap;
            $product->tensanpham=$request->tensanpham;
            $product->soluong=$request->soluong;
            $product->dongia=$request->dongia;
            $product->save();
        $product->ProductDetail()->update([
            'idthuonghieu'=>$request->idthuonghieu,
            'idmau'=>$request->idmau,
            'idloaimay'=>$request->idloaimay,
            'idchatlieu'=>$request->idchatlieu,
            'gioitinh'=>$request->gioitinh,
            'xuatxu'=>$request->xuatxu,
            'mota'=>$request->mota,
            'anh'=>$request->anh
        ]);
        if (is_null($product)) {
            $arr = [
            'success' => false,
            'message' => 'Không có sản phẩm này',
            'data' => []
            ];
            return response()->json($arr, 200);
        };
        $arr = [
           'status' => true,
           'message' => 'Cập nhật thành công',
           'data' => new ProductResource($product),
        ];
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $input =Product::find($id);
        if (!$input) {
            $arr = [
            'success' => false,
            'message' => 'Không có sản phẩm này',
            'data' => []
            ];
            return response()->json($arr, 200);
        } 
        $input->visible='0';
        $input->save();
        $arr = [
           'status' => true,
           'message' => 'Vô hiệu hóa sản phẩm thành công',
           'data' => new ProductResource($input),
        ];
        return response()->json($arr, 200);
    }
}