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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::group(['middleware'=>'api'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

//Quản lý tài khoản
use App\Http\Controllers\AccountController;
Route::get('tk', [AccountController::class, 'index']);
Route::post('tk/add', [AccountController::class, 'store'])->name("newAccount");
Route::delete('tk/update', [AccountController::class, 'store']);
Route::delete('tk/delete/{idtaikhoan}', [AccountController::class, 'destroy']);

//Quản lý nhân viên
use App\Http\Controllers\EmployeeController;
Route::get('nv', [EmployeeController::class, 'index']);
Route::post('nv/add', [EmployeeController::class, 'store']);
Route::put('nv/update', [EmployeeController::class, 'update']);
Route::get('nv/lastid', [EmployeeController::class, 'lastid']);
Route::delete('nv/delete/{idnhanvien}', [EmployeeController::class, 'destroy']);

//Quản lý khách hàng
use App\Http\Controllers\CustomerController;
Route::get('kh', [CustomerController::class, 'index']);
Route::post('kh/add', [CustomerController::class, 'store']);
Route::put('kh/update', [CustomerController::class, 'update']);
Route::delete('kh/detele/{idkhachhang}', [CustomerController::class, 'destroy']);

//Quản lý hóa đơn
use App\Http\Controllers\BillController;
Route::get('hd', [BillController::class, 'index']);


//Quản lý chức vụ
use App\Http\Controllers\PositionController;
Route::get('cv', [PositionController::class, 'index']);
Route::post('cv/add', [PositionController::class, 'store']);
Route::put('cv/update', [PositionController::class, 'update']);
Route::delete('cv/delete/{idchucvu}', [PositionController::class, 'destroy']);

//chi tiết chức vụ
use App\Http\Controllers\PositionDetailController;
Route::get('cv/{idchucvu}', [PositionDetailController::class, 'index']);


//Route chương trình khuyến mãi 
use App\Http\Controllers\PromotionController;
Route::get('ctkm', [PromotionController::class,'index']);
Route::post('ctkm/add', [PromotionController::class,'store']);
Route::put('ctkm/update/{idkhuyenmai}', [PromotionController::class,'update']);
Route::delete('ctkm/delete/{idkhuyenmai}', [PromotionController::class,'Hide']);

//Quản lý sản phẩm
use App\Http\Controllers\ProductController;
Route::get('sp', [ProductController::class, 'index']);
Route::post('sp/add', [ProductController::class, 'store']);
Route::get('sp/{id}', [ProductController::class, 'show']);
Route::put('sp/update/{id}', [ProductController::class, 'update']);
Route::delete('sp/hide/{id}', [ProductController::class, 'Hide']);

//Quản lý nhà cung cấp
use App\Http\Controllers\SupplierController;
Route::get('ncc', [SupplierController::class, 'index']);
Route::post('ncc/add', [SupplierController::class, 'store']);
Route::put('ncc/update/{id}', [SupplierController::class, 'update']);
Route::delete('ncc/hide/{id}', [SupplierController::class, 'Hide']);

//Quản lý thương hiệu
use App\Http\Controllers\TrademarkController;
Route::get('th', [TrademarkController::class, 'index']);
Route::post('th/add', [TrademarkController::class, 'store']);
Route::put('th/update/{idthuonghieu}', [TrademarkController::class, 'update']);
Route::delete('th/hide/{idthuonghieu?}', [TrademarkController::class, 'Hide']);

//Quản lý màu sắc
use App\Http\Controllers\ColorController;
Route::get('ms', [ColorController::class, 'index']);
Route::post('ms/add', [ColorController::class, 'store']);
Route::put('ms/update/{idmau}', [ColorController::class, 'update']);
Route::delete('ms/hide/{idmau}', [ColorController::class, 'Hide']);

//Quản lý chất liệu
use App\Http\Controllers\MaterialController;
Route::get('cl', [MaterialController::class, 'index']);
Route::post('cl/add', [MaterialController::class, 'store']);
Route::put('cl/update/{idchatlieu}', [MaterialController::class, 'update']);
Route::delete('cl/hide/{idchatlieu}', [MaterialController::class, 'Hide']);

//Quản lý loại máy
use App\Http\Controllers\MachineTypeController;
Route::get('lm', [MachineTypeController::class, 'index']);
Route::post('lm/add', [MachineTypeController::class, 'store']);
Route::put('lm/update/{idloaimay}', [MachineTypeController::class, 'update']);
Route::delete('lm/hide/{idloaimay}', [MachineTypeController::class, 'Hide']);

//Quản lý nhập hàng
use App\Http\Controllers\ReceivingVoucherController;
Route::get('pnh', [ReceivingVoucherController::class, 'index']);
Route::get('pnh/{idpnh}', [ReceivingVoucherController::class, 'show']);
Route::post('pnh/add', [ReceivingVoucherController::class, 'store']);

//Trang chủ
use App\Http\Controllers\HomeController;
Route::get('home',[HomeController::class,'ListProduct']);
Route::get('Category',[HomeController::class,'Category']);
Route::get('/search/sp/{tensanpham}', [HomeController::class, 'searchbyname']);
Route::get('/search/th/{tenthuonghieu}', [HomeController::class, 'searchbytrademask']);
Route::get('/showdetail/{idsanpham}', [HomeController::class, 'showdetail']);