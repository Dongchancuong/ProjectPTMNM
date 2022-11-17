<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chitiet_pnh extends Seeder
{
    public function run()
    {
        DB::table('chitiet_pnh')->insert([ 
            ['idpnh' => 'PNH01', 'idsanpham' => 'NH8380-15E', 'soluong' => 50, 'created_at' => date("Y-m-d H:i:s")],
            ['idpnh' => 'PNH01', 'idsanpham' => 'SER02001W0', 'soluong' => 50, 'created_at' => date("Y-m-d H:i:s")],
            ['idpnh' => 'PNH01', 'idsanpham' => 'FS5532', 'soluong' => 50, 'created_at' => date("Y-m-d H:i:s")],
            ['idpnh' => 'PNH01', 'idsanpham' => 'T099.407.11.058.00', 'soluong' => 50, 'created_at' => date("Y-m-d H:i:s")],
            ['idpnh' => 'PNH02', 'idsanpham' => '96P214', 'soluong' => 13, 'created_at' => date("Y-m-d H:i:s")],
            ['idpnh' => 'PNH02', 'idsanpham' => 'SKK883P1', 'soluong' => 11, 'created_at' => date("Y-m-d H:i:s")],
            ['idpnh' => 'PNH02', 'idsanpham' => 'BGA-130-4BDR', 'soluong' => 20, 'created_at' => date("Y-m-d H:i:s")],
            ['idpnh' => 'PNH03', 'idsanpham' => 'ER0182-59E', 'soluong' => 15, 'created_at' => date("Y-m-d H:i:s")],
            ['idpnh' => 'PNH03', 'idsanpham' => 'C4572/1', 'soluong' => 7, 'created_at' => date("Y-m-d H:i:s")],
            ['idpnh' => 'PNH04', 'idsanpham' => 'L4.209.2.32.2', 'soluong' => 12, 'created_at' => date("Y-m-d H:i:s")],
            ['idpnh' => 'PNH04', 'idsanpham' => 'MK2779', 'soluong' => 12, 'created_at' => date("Y-m-d H:i:s")],
            ['idpnh' => 'PNH04', 'idsanpham' => 'SRZ464P1', 'soluong' => 10, 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
