<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\BillDetail;
use App\Http\Resources\BillDetail as BillDetailResource;

class BillDetailController extends Controller
{
    public function index()
    {
        
    }
    
    public function show(Request $request)
    {
        $billdetail = BillDetail::where('idhoadon', '=', $request['idhoadon'])->get();
        $arr = [
        'status' => true,
        'message' => "Chi tiết hóa đơn",
        'data'=>BillDetailResource::collection($billdetail)
        ];
        return response()->json($arr, 200);
    }

    // public function store(Request $request)
    // {
        
    // }

    // public function update(Request $request, $id)
    // {
        
    // }

    
    // public function destroy($id)
    // {
        
    // }
}
