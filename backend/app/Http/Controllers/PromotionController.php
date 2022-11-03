<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Http\Resources\Promotion as PromotionResource;
use Illuminate\Support\Facades\Validator;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //Trả về danh sách khuyến mãi
         $promotion = Promotion::all();
         $arr = [
         'status' => true,
         'message' => "Danh sách chương trình khuyến mãi",
         'data'=>PromotionResource::collection($promotion)
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
        //Thêm khuyến mãi 
        $input = $request->all();
        $validator = Validator::make($input, [
            'idkhuyenmai' => 'required',
            'giamgia' => 'required', 
            'mota' => 'required',
            'ngaybatdau' => 'required', 
            'ngayketthuc' => 'required',
        ]);
        if ($validator->fails()) {
            $arr = [
                'success' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors()
            ];
            return response()->json($arr, 200);
        }
        $promotion = Promotion::create($input);
        $arr = [
            'status' => true,
            'message' => "Thêm khuyến mãi thành công",
            'data' => new PromotionResource($promotion)
        ];
        return response()->json($arr, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Hiện thông tin chi tiết khuyến mãi
        $promotion = Promotion::find($id);
        if (is_null($promotion)) {
           $arr = [
             'success' => false,
             'message' => 'Không có chương trình khuyến mãi này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết chương trình khuyến mãi",
          'data'=> new PromotionResource($promotion)
        ];
        return response()->json($arr, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        //Cập nhật chương trình khuyến mãi
        $input = $request->all();
        $validator = Validator::make($input, [
            //'idkhuyenmai'=>'required',
           'giamgia' => 'required', 
           'mota' => 'required',
           'ngaybatdau' =>'required',
           'ngayketthuc' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $promotion -> idkhuyenmai = $input['idkhuyenmai'];
        $promotion -> giamgia = $input['giamgia'];
        $promotion -> mota = $input['mota'];
        $promotion -> ngaybatdau = $input['ngaybatdau'];
        $promotion -> ngayketthuc = $input['ngayketthuc'];
        $promotion -> save();
            $arr = [
            'status' => true,
            'message' => 'Sản phẩm cập nhật thành công',
            'data' => new PromotionResource($promotion)
        ];
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
        $promotion->delete();
        $arr = [
           'status' => true,
           'message' =>'Sản phẩm đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
