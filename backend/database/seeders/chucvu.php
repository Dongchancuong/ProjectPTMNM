<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chucvu extends Seeder
{
    public function run()
    {
        DB::table('chucvu')->insert([ 
            ['idchucvu' => 'QL', 'tenchucvu' => 'Quản lý', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_BH', 'tenchucvu' => 'Nhân viên bán hàng', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_CSKH', 'tenchucvu' => 'Nhân viên chăm sóc khách hàng', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'NV_TN', 'tenchucvu' => 'Nhân viên thu ngân', 'created_at' => date("Y-m-d H:i:s")],
            ['idchucvu' => 'KH', 'tenchucvu' => 'Khách hàng', 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
