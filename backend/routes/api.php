<?php

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
Route::group(['middleware' => 'api'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);   
});



//Quản lý nhân viên
use App\Http\Controllers\EmployeeController;
// Route::resource('nv', EmployeeController::class);
Route::get('nv', [EmployeeController::class, 'index']);
// Route::get('nv', function(){
//     return phpinfo();
// });

//Quản lý khách hàng
use App\Http\Controllers\CustomerController;

Route::resource('kh', CustomerController::class);

//Quản lý hóa đơn
use App\Http\Controllers\BillController;

Route::resource('hd', BillController::class);

//Quản lý phiếu đặt hàng
use App\Http\Controllers\OrderController;

Route::resource('pdh', OrderController::class);



// **Quản lý chức vụ**
use App\Http\Controllers\PositionController;
// Route::resource('cv', PositionController::class);
Route::resource('cv', PositionController::class);

//chi tiết chức vụ
use App\Http\Controllers\PositionDetailController;

Route::resource('ct_cv', PositionDetailController::class);
