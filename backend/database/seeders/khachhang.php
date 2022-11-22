<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class khachhang extends Seeder
{

public function run(){
DB::table('khachhang')->insert([ 
    ['idkhachhang' => 'KH01', 'idtaikhoan' => 'TK11', 'hoten' => 'Dương Đăng Khoa', 'sdt' => '0913572529', 'diachi' => '472 Tôn Đức Thắng', 
    'email' => 'khoatran283@gmail.com', 'tichluy' => 1040490000, 'capdo' => 3, 'created_at' => date("Y-m-d H:i:s")],
    ['idkhachhang' => 'KH02', 'idtaikhoan' => 'TK12', 'hoten' => 'Trịnh Hoài Nam', 'sdt' => '0929773433', 'diachi' => '23 Lý Thường Kiệt', 
    'email' => 'dvnam229@gmail.com', 'tichluy' => 89024000, 'capdo' => 2, 'created_at' => date("Y-m-d H:i:s")],
    ['idkhachhang' => 'KH03', 'idtaikhoan' => 'TK13', 'hoten' => 'Võ Trung Kiệt', 'sdt' => '0911915725', 'diachi' => '723 Nguyễn Thị Minh Khai', 
    'email' => 'kiettt3z@gmail.com', 'tichluy' => 120946000, 'capdo' => 3, 'created_at' => date("Y-m-d H:i:s")],
    ['idkhachhang' => 'KH04', 'idtaikhoan' => 'TK14', 'hoten' => 'Lê Duy', 'sdt' => '0929397633', 'diachi' => '234 Hồ Xuân Hương', 
    'email' => 'duyl29@gmail.com', 'tichluy' => 12400000, 'capdo' => 1, 'created_at' => date("Y-m-d H:i:s")],
    ['idkhachhang' => 'KH05', 'idtaikhoan' => 'TK15', 'hoten' => 'Nguyệt Lan', 'sdt' => '0813179722', 'diachi' => '373 Tôn Đức Thắng', 
    'email' => 'lann352@gmail.com', 'tichluy' => 4095000, 'capdo' => 1, 'created_at' => date("Y-m-d H:i:s")],
]);
}

}
