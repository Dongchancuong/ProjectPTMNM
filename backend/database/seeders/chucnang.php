<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chucnang extends Seeder
{
    public function run()
    {
        DB::table('chucnang')->insert([
            ['idchucnang' => 'QLCV', 'tenchucnang' => 'Quản lý chức vụ', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucnang' => 'QLSP', 'tenchucnang' => 'Quản lý sản phẩm', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucnang' => 'QLTK', 'tenchucnang' => 'Quản lý tài khoản', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucnang' => 'QLNV', 'tenchucnang' => 'Quản lý nhân viên', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucnang' => 'QLKH', 'tenchucnang' => 'Quản lý khách hàng', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucnang' => 'QLHD', 'tenchucnang' => 'Quản lý hóa đơn', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucnang' => 'QLPDH', 'tenchucnang' => 'Quản lý phiếu đặt hàng', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucnang' => 'QLPNH', 'tenchucnang' => 'Quản lý phiếu nhập hàng', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucnang' => 'QLCTKM', 'tenchucnang' => 'Quản lý chương trình khuyến mãi', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucnang' => 'QLNCC', 'tenchucnang' => 'Quản lý nhà cung cấp', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucnang' => 'KHACHHANG', 'tenchucnang' => 'Khách hàng', 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
