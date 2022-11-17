<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class hoadon extends Seeder
{
    public function run()
    {
        DB::table('hoadon')->insert([ 
            ['idhoadon' => 'HD01', 'idkhachhang' => 'KH01', 'idkhuyenmai' => 'ORDER_HALLO01', 'idnhanvien' => 'NV01', 
            'hoten' => 'Dương Đăng Khoa', 'diachi' => '472 Tôn Đức Thắng', 'sdt' => '0913572529', 'email' => 'khoatran283@gmail.com', 'tonggia' => 6951000, 'soluong' => 3, 'created_at' => date("Y-m-d H:i:s")],
            ['idhoadon' => 'HD02', 'idkhachhang' => 'KH04', 'idkhuyenmai' => 'ALL_CASIO-SALE01', 'idnhanvien' => 'NV01', 
            'hoten' => 'Lê Duy', 'diachi' => '234 Hồ Xuân Hương', 'sdt' => '0929397633', 'email' => 'duyl29@gmail.com', 'tonggia' => 7108000, 'soluong' => 2, 'created_at' => date("Y-m-d H:i:s")],
            ['idhoadon' => 'HD03', 'idkhachhang' => null, 'idkhuyenmai' => null, 'idnhanvien' => 'NV01', 
            'hoten' => 'Dương Văn Hào', 'diachi' => '108 Nguyễn Trường Tộ', 'sdt' => '0929397621', 'email' => 'duonghao3101@gmail.com', 'tonggia' => 2616000, 'soluong' => 1, 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
