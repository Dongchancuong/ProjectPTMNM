<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chitiet_chucvu extends Seeder
{
    public function run()
    {
        DB::table('chitiet_chucvu')->insert([
            //Quản lý
            ['idchucvu' => 'QL', 'idchucnang' => 'QLCV', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'QL', 'idchucnang' => 'QLSP', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'QL', 'idchucnang' => 'QLTK', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'QL', 'idchucnang' => 'QLNV', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'QL', 'idchucnang' => 'QLKH', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'QL', 'idchucnang' => 'QLHD', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'QL', 'idchucnang' => 'QLPDH', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'QL', 'idchucnang' => 'QLPNH', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'QL', 'idchucnang' => 'QLCTKM', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'QL', 'idchucnang' => 'QLNCC', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],

            //Nhân viên bán hàng
            ['idchucvu' => 'NV_BH', 'idchucnang' => 'QLCV', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_BH', 'idchucnang' => 'QLSP', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_BH', 'idchucnang' => 'QLTK', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_BH', 'idchucnang' => 'QLNV', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_BH', 'idchucnang' => 'QLKH', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_BH', 'idchucnang' => 'QLHD', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_BH', 'idchucnang' => 'QLPDH', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_BH', 'idchucnang' => 'QLPNH', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_BH', 'idchucnang' => 'QLCTKM', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_BH', 'idchucnang' => 'QLNCC', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],

            //Nhân viên chăm sóc khách hàng
            ['idchucvu' => 'NV_CSKH', 'idchucnang' => 'QLCV', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_CSKH', 'idchucnang' => 'QLSP', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_CSKH', 'idchucnang' => 'QLTK', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_CSKH', 'idchucnang' => 'QLNV', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_CSKH', 'idchucnang' => 'QLKH', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_CSKH', 'idchucnang' => 'QLHD', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_CSKH', 'idchucnang' => 'QLPDH', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_CSKH', 'idchucnang' => 'QLPNH', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_CSKH', 'idchucnang' => 'QLCTKM', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_CSKH', 'idchucnang' => 'QLNCC', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],

            //Nhân viên thu ngân
            ['idchucvu' => 'NV_TN', 'idchucnang' => 'QLCV', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_TN', 'idchucnang' => 'QLSP', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_TN', 'idchucnang' => 'QLTK', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_TN', 'idchucnang' => 'QLNV', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_TN', 'idchucnang' => 'QLKH', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_TN', 'idchucnang' => 'QLHD', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_TN', 'idchucnang' => 'QLPDH', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_TN', 'idchucnang' => 'QLPNH', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_TN', 'idchucnang' => 'QLCTKM', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_TN', 'idchucnang' => 'QLNCC', 'visible' => '0', 'created_at' => date("Y-m-d H:i:s")],

            //Khách hàng
            ['idchucvu' => 'KH', 'idchucnang' => 'KHACHHANG', 'visible' => '1', 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
