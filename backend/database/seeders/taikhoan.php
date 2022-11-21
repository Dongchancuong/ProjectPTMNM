<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class taikhoan extends Seeder
{
    public function run()
    {
        DB::table('taikhoan')->insert([ 
            ['idtaikhoan' => 'TK_NV01', 'idchucvu' => 'QL', 'tentaikhoan' => 'admin1', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK_NV02', 'idchucvu' => 'QL', 'tentaikhoan' => 'admin2', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK_NV03', 'idchucvu' => 'QL', 'tentaikhoan' => 'admin3', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK_NV04', 'idchucvu' => 'QL', 'tentaikhoan' => 'admin4', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK_NV05', 'idchucvu' => 'NV_BH', 'tentaikhoan' => 'vannam47', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK_NV06', 'idchucvu' => 'NV_CSKH', 'tentaikhoan' => 'nguyenvana283', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK_NV07', 'idchucvu' => 'NV_CSKH', 'tentaikhoan' => 'xuanbac23', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK_NV08', 'idchucvu' => 'NV_TN', 'tentaikhoan' => 'namcao34', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK_NV09', 'idchucvu' => 'NV_TN', 'tentaikhoan' => 'donkihote113', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK_NV10', 'idchucvu' => 'NV_BH', 'tentaikhoan' => 'vannam398', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK_KH01', 'idchucvu' => 'KH', 'tentaikhoan' => 'khoa1924', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK_KH02', 'idchucvu' => 'KH', 'tentaikhoan' => 'tuankiet293', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK_KH03', 'idchucvu' => 'KH', 'tentaikhoan' => 'abc293', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK_KH04', 'idchucvu' => 'KH', 'tentaikhoan' => 'duyle283', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK_KH05', 'idchucvu' => 'KH', 'tentaikhoan' => '@@@83', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
