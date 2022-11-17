<?php


use App\Http\Resources\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Check đăng nhập/đăng xuất cho từng tài khoản
use App\Http\Controllers\AuthController;
//Quản lý nhân viên
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::group(['middleware'=>'api'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});



use App\Http\Controllers\EmployeeController;
Route::get('nv', [EmployeeController::class, 'index']);

//Quản lý khách hàng
use App\Http\Controllers\CustomerController;
Route::get('kh', [CustomerController::class, 'index']);

//Quản lý hóa đơn
use App\Http\Controllers\BillController;
Route::get('hd', [BillController::class, 'index']);


//Quản lý chức vụ
use App\Http\Controllers\PositionController;
Route::get('cv', [PositionController::class, 'index']);
Route::post('cv/add', [PositionController::class, 'store']);
Route::post('cv/update/{idchucvu?}', [PositionController::class, 'update']);
Route::delete('cv/delete/{idchucvu?}', [PositionController::class, 'destroy']);

//chi tiết chức vụ
use App\Http\Controllers\PositionDetailController;
Route::get('cv/{idchucvu?}', [PositionDetailController::class, 'index']);
Route::get('a/detail', [PositionDetailController::class, 'detail']);


//Route chương trình khuyến mãi 
use App\Http\Controllers\PromotionController;
Route::get('promotion', [PromotionController::class,'index']);
Route::post('promotion', [PromotionController::class,'store']);

//Quản lý sản phẩm
use App\Http\Controllers\ProductController;
Route::get('sp', [ProductController::class, 'index']);
Route::post('sp/add', [ProductController::class, 'store']);
Route::get('sp/{id}', [ProductController::class, 'show']);
Route::post('sp/update/{id}', [ProductController::class, 'update']);
Route::delete('sp/delete/{id}', [ProductController::class, 'destroy']);

//Quản lý nhà cung cấp
use App\Http\Controllers\SupplierController;
Route::get('ncc', [SupplierController::class, 'index']);
Route::get('ncc/{id}', [SupplierController::class, 'show']);
Route::post('ncc/add', [SupplierController::class, 'store']);
Route::post('ncc/update/{id}', [SupplierController::class, 'update']);
Route::delete('ncc/delete/{id}', [SupplierController::class, 'destroy']);

//Quản lý thương hiệu
use App\Http\Controllers\TrademarkController;
Route::get('th', [TrademarkController::class, 'index']);
Route::post('th/add', [TrademarkController::class, 'store']);
Route::get('th/{id}', [TrademarkController::class, 'show']);
Route::post('th/update/{idchucvu?}', [TrademarkController::class, 'update']);
Route::delete('th/delete/{idchucvu?}', [TrademarkController::class, 'destroy']);

//Quản lý màu sắc
use App\Http\Controllers\ColorController;
Route::get('ms', [ColorController::class, 'index']);
Route::post('ms/add', [ColorController::class, 'store']);
Route::get('ms/{id}', [ColorController::class, 'show']);
Route::post('ms/update/{idchucvu?}', [ColorController::class, 'update']);
Route::delete('ms/delete/{idchucvu?}', [ColorController::class, 'destroy']);

//Quản lý chất liệu
use App\Http\Controllers\MaterialController;
Route::get('cl', [MaterialController::class, 'index']);
Route::post('cl/add', [MaterialController::class, 'store']);
Route::get('cl/{id}', [MaterialController::class, 'show']);
Route::post('cl/update/{idchucvu?}', [MaterialController::class, 'update']);
Route::delete('cl/delete/{idchucvu?}', [MaterialController::class, 'destroy']);

//Quản lý màu sắc
use App\Http\Controllers\MachineTypeController;
Route::get('lm', [MachineTypeController::class, 'index']);
Route::post('lm/add', [MachineTypeController::class, 'store']);
Route::get('lm/{id}', [MachineTypeController::class, 'show']);
Route::post('lm/update/{idchucvu?}', [MachineTypeController::class, 'update']);
Route::delete('lm/delete/{idchucvu?}', [MachineTypeController::class, 'destroy']);
