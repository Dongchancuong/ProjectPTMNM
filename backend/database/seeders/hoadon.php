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
            ['idhoadon' => 'HD02', 'idkhachhang' => 'KH04', 'idkhuyenmai' => 'CASIO_SALE01', 'idnhanvien' => 'NV01', 
            'hoten' => 'Lê Duy', 'diachi' => '234 Hồ Xuân Hương', 'sdt' => '0929397633', 'email' => 'duyl29@gmail.com', 'tonggia' => 7108000, 'soluong' => 2, 'created_at' => date("Y-m-d H:i:s")],
            ['idhoadon' => 'HD03', 'idkhachhang' => 'KH02', 'idkhuyenmai' => null, 'idnhanvien' => 'NV01', 
            'hoten' => 'Dương Văn Hào', 'diachi' => '312 Tô Hiến Thành', 'sdt' => '0929393021', 'email' => 'gmail', 'tonggia' => 2616000, 'soluong' => 2, 'created_at' => date("Y-m-d H:i:s")],
            ['idhoadon' => 'HD04', 'idkhachhang' => 'KH03', 'idkhuyenmai' => null, 'idnhanvien' => 'NV01', 
            'hoten' => 'Dương Văn Hào', 'diachi' => '350 Trần Phú', 'sdt' => '0929397621', 'email' => 'duonghao3101@gmail.com', 'tonggia' => 4416000, 'soluong' => 1, 'created_at' => date("Y-m-d H:i:s")],
            ['idhoadon' => 'HD05', 'idkhachhang' => 'KH05', 'idkhuyenmai' => null, 'idnhanvien' => 'NV01', 
            'hoten' => 'Dương Văn Hào', 'diachi' => '250 NGuyễn Trãi', 'sdt' => '0929397621', 'email' => 'duonghao3101@gmail.com', 'tonggia' => 5616000, 'soluong' => 1, 'created_at' => date("Y-m-d H:i:s")],
            ['idhoadon' => 'HD06', 'idkhachhang' => 'KH04', 'idkhuyenmai' => null, 'idnhanvien' => 'NV01', 
            'hoten' => 'Dương Văn Hào', 'diachi' => '180 Trần Đình Xu', 'sdt' => '0703.298.631', 'email' => 'duonghao3101@gmail.com', 'tonggia' => 6616000, 'soluong' => 1, 'created_at' => date("Y-m-d H:i:s")],
            ['idhoadon' => 'HD07', 'idkhachhang' => 'KH05', 'idkhuyenmai' => null, 'idnhanvien' => 'NV01', 
            'hoten' => 'Dương Văn Hào', 'diachi' => '980 Võ Văn Kiệt', 'sdt' => '0349.894.857', 'email' => 'duonghao3101@gmail.com', 'tonggia' => 3616000, 'soluong' => 1, 'created_at' => date("Y-m-d H:i:s")],
            ['idhoadon' => 'HD08', 'idkhachhang' => null, 'idkhuyenmai' => null, 'idnhanvien' => 'NV01', 
            'hoten' => 'Dương Văn Hào', 'diachi' => '200 Cách Mạng Tháng Tám', 'sdt' => '0704.477.604', 'email' => 'duonghao3101@gmail.com', 'tonggia' => 4316000, 'soluong' => 1, 'created_at' => date("Y-m-d H:i:s")],
            
        ]);
    }
}
