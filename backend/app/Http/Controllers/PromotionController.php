<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionRequest;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionRequest $request)
    {
        //Thêm khuyến mãi 
        $input = $request->all();
        if(Promotion::find($request->idkhuyenmai)){
            $arr = [
                'status' => false,
                'message'=>"Mã khuyến mãi này đã tồn tại",
            ];
            return response()->json($arr, 400);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionRequest $request,$id)
    {
        //Cập nhật chương trình khuyến mãi
        $promotion=Promotion::find($id);
        if(!$promotion){
            $arr = [
                'success' => false,
                'message' => 'Không tìm thấy chương trình khuyến mãi này',
              ];
              return response()->json($arr, 400);
        }
        $promotion->idkhuyenmai=$request->idkhuyenmai;
        $promotion->tenchuongtrinh=$request->tenchuongtrinh;
        $promotion->giamgia=$request->giamgia;
        $promotion->ngayketthuc=$request->ngayketthuc;
        $promotion->ngaybatdau=$request->ngaybatdau;
        $promotion -> save();
        $arr = [
            'status' => true,
            'message' => 'Đã cập nhật thành công chương trình khuyến mãi',
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
    public function Hide($id)
    {
        $promotion=Promotion::find($id);
        $promotion['visible']='0';
        if(!$promotion){
            $arr = [
                'success' => false,
                'message' => 'Không tìm thấy chương trình khuyến mãi này',
            ];
            return response()->json($arr, 400);
        }
        $promotion->update();
        $arr = [
           'status' => true,
           'message' =>'Chương trình này đã được ẩn thành công',
        ];
        return response()->json($arr, 200);
    }
}
