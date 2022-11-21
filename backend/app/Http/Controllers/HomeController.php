<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\MachineType;
use App\Models\Material;
use App\Models\Product;
use App\Models\Trademark;

class HomeController extends Controller
{
    public function ListProduct(){
        $product=Product::with('ProductDetail')->get();
        $arr=['status' => true,
        'message' => "Danh sách sản phẩm",
        'data'=>$product,
    ];
    return response()->json($arr,200);
    }
    public function searchbyname($tensanpham)
    {
        $input =Product::with('ProductDetail')->where('tensanpham','LIKE','%'.$tensanpham.'%')->get();
        if(count($input)){
            $arr=[
                'success'=>true,
                'message'=>'Danh sách sản phẩm đã tìm kiếm',
                'data'=>$input
            ];
            return Response()->json($arr,200);
        }
    }
    public function searchbytrademask($thuonghieu){
        $input =Trademark::with('ProductDetail')->where('tenthuonghieu','LIKE','%'.$thuonghieu.'%')->get();
        if(count($input)){
            $arr=[
                'success'=>true,
                'message'=>'Danh sách sản phẩm theo thương hiệu',
                'data'=>$input
            ];
            return Response()->json($arr,200);
        }   
        else{ 
            $arr=[
            'success'=>false,
            'message'=>'Không có sản phẩm nào',
            'data'=>$input
        ];
        }       
        return Response()->json($arr,400);
    }
    public function searchbymaterial($chatlieu){
        $input =Material::with('ProductDetail')->where('tenthuonghieu','LIKE','%'.$chatlieu.'%')->get();
        if(count($input)){
            $arr=[
                'success'=>true,
                'message'=>'Danh sách sản phẩm theo chất liệu',
                'data'=>$input
            ];
            return Response()->json($arr,200);
        }   
        else{ 
            $arr=[
            'success'=>false,
            'message'=>'Không có sản phẩm nào',
            'data'=>$input
        ];
        }       
        return Response()->json($arr,400);
    }
    public function searchbymachinetype($loaimay){
        $input =MachineType::with('ProductDetail')->where('tenthuonghieu','LIKE','%'.$loaimay.'%')->get();
        if(count($input)){
            $arr=[
                'success'=>true,
                'message'=>'Danh sách sản phẩm theo chất liệu',
                'data'=>$input
            ];
            return Response()->json($arr,200);
        }   
        else{ 
            $arr=[
            'success'=>false,
            'message'=>'Không có sản phẩm nào',
            'data'=>$input
        ];
        }       
        return Response()->json($arr,400);
    }
    
    public function showdetail($id){
        $product=Product::with('ProductDetail')->find($id);
        $idthuonghieu=$product->ProductDetail->idthuonghieu;
        $idmau=$product->ProductDetail->idmau;
        $idchatlieu=$product->ProductDetail->idchatlieu;
        $idloaimay=$product->ProductDetail->idloaimay;
        $trademask=Trademark::find($idthuonghieu)->tenthuonghieu;
        $color=Color::find($idmau)->tenmau;
        $machinetype=MachineType::find($idloaimay)->tenloaimay;
        $material=Material::find($idchatlieu)->tenchatlieu;
        $arr = [
            'status' => true,
            'message' => 'Thông tin chi tiết sản phẩm',
            'data'=>$product,
            'color'=>$color,
            'trademask'=>$trademask,
            'machinetype'=>$machinetype,
            'material'=>$material,
         ];
        return response()->json($arr, 200);
    }
}
