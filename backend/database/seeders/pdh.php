<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pdh extends Seeder
{
    public function run()
    {
        DB::table('pdh')->insert([ 
            ['idphieudh' => 'PDH01', 'idkhuyenmai' => 'ORDER_HALLO01', 'idnhanvien' => null, 'hoten' => 'Dương Đăng Khoa', 'sdt' => '0913572529', 
            'email' => 'khoatran283@gmail.com', 'diachi' => '472 Tôn Đức Thắng', 'tonggia' => 6951000, 'tinhtrang' => false, 'created_at' => date("Y-m-d H:i:s")],
            ['idphieudh' => 'PDH02', 'idkhuyenmai' => 'ALL_CASIO-SALE01', 'idnhanvien' => null, 'hoten' => 'Lê Duy', 'sdt' => '0929397633', 
            'email' => 'duyl29@gmail.com', 'diachi' => '234 Hồ Xuân Hương', 'tonggia' => 7108000, 'tinhtrang' => false, 'created_at' => date("Y-m-d H:i:s")],
            ['idphieudh' => 'PDH03', 'idkhuyenmai' => null, 'idnhanvien' => null, 'hoten' => 'Dương Văn Hào', 'sdt' => '0929397621', 
            'email' => 'duonghao3101@gmail.com', 'diachi' => '108 Nguyễn Trường Tộ', 'tonggia' => 2616000, 'tinhtrang' => true, 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
