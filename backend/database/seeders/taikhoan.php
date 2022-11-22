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
            ['idtaikhoan' => 'TK01', 'idchucvu' => 'QL', 'tentaikhoan' => 'admin1', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK02', 'idchucvu' => 'QL', 'tentaikhoan' => 'admin2', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK03', 'idchucvu' => 'QL', 'tentaikhoan' => 'admin3', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK04', 'idchucvu' => 'QL', 'tentaikhoan' => 'admin4', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK05', 'idchucvu' => 'NV_BH', 'tentaikhoan' => 'vannam47', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK06', 'idchucvu' => 'NV_CSKH', 'tentaikhoan' => 'nguyenvana283', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK07', 'idchucvu' => 'NV_CSKH', 'tentaikhoan' => 'xuanbac23', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK08', 'idchucvu' => 'NV_TN', 'tentaikhoan' => 'namcao34', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK09', 'idchucvu' => 'NV_TN', 'tentaikhoan' => 'donkihote113', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK10', 'idchucvu' => 'NV_BH', 'tentaikhoan' => 'vannam398', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK11', 'idchucvu' => 'KH', 'tentaikhoan' => 'khoa1924', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK12', 'idchucvu' => 'KH', 'tentaikhoan' => 'tuankiet293', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK13', 'idchucvu' => 'KH', 'tentaikhoan' => 'abc293', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK14', 'idchucvu' => 'KH', 'tentaikhoan' => 'duyle283', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
            ['idtaikhoan' => 'TK15', 'idchucvu' => 'KH', 'tentaikhoan' => '@@@83', 'matkhau' => '123456', 'visible' => '1' , 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
