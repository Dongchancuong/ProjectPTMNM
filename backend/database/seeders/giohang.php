<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class giohang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('giohang')->insert([ 
            ['id' => '1', 'idtaikhoan' => 'TK11', 'idsanpham' => 'NH8363-14H','soluong' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['id' => '2', 'idtaikhoan' => 'TK11', 'idsanpham' => 'SER02001W0','soluong' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['id' => '3', 'idtaikhoan' => 'TK11', 'idsanpham' => 'NH8380-15E','soluong' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['id' => '4', 'idtaikhoan' => 'TK11', 'idsanpham' => 'SPC087P1',  'soluong' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['id' => '5', 'idtaikhoan' => 'TK12', 'idsanpham' => 'DW00100314','soluong' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['id' => '6', 'idtaikhoan' => 'TK13', 'idsanpham' => 'SRKZ49P1',  'soluong' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['id' => '7', 'idtaikhoan' => 'TK14', 'idsanpham' => 'SKK883P1',  'soluong' => '1', 'created_at' => date("Y-m-d H:i:s")],
            ['id' => '8', 'idtaikhoan' => 'TK15', 'idsanpham' => 'SRZ464P1',  'soluong' => '1', 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
