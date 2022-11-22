<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Http\Resources\Product as ProductResource;

class CategoryController extends Controller
{

    public function show($tentheloai, $giatri)
    {
        // $model = app("App\Models\\$tenbang");
        // $collection = DB::table($tenbang)->select("*")->get();
        // $result = $collection->contains($giatri); 
        // if ($result) 
        // $arrCol = Schema::getColumnListing($model->getTable());
        $query = Product::select('sanpham.idsanpham', 'tensanpham', 'dongia', 'anh')
        ->join('chitiet_sanpham', 'sanpham.idsanpham', '=', 'chitiet_sanpham.idsanpham')
        ->where($tentheloai, '=', $giatri)->get();
        $arr = [
            'status' => true,
            'message' => 'Danh sách sản phẩm '.$giatri,
            'data' => $query
        ];
        return response()->json($arr, 200);
    }

}
