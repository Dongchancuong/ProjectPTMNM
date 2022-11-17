<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mausac extends Seeder
{
    public function run()
    {
        DB::table('mausac')->insert([
            ['idmau' => 'DO', 'tenmau' => 'Đỏ', 'created_at' => date("Y-m-d H:i:s")],
            ['idmau' => 'DEN', 'tenmau' => 'Đen', 'created_at' => date("Y-m-d H:i:s")],
            ['idmau' => 'TRANG', 'tenmau' => 'Trắng', 'created_at' => date("Y-m-d H:i:s")],
            ['idmau' => 'HONG', 'tenmau' => 'Hồng', 'created_at' => date("Y-m-d H:i:s")],
            ['idmau' => 'VANG', 'tenmau' => 'Vàng', 'created_at' => date("Y-m-d H:i:s")],
            ['idmau' => 'XANH', 'tenmau' => 'Xanh', 'created_at' => date("Y-m-d H:i:s")],
            ['idmau' => 'XAM', 'tenmau' => 'Xám', 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
