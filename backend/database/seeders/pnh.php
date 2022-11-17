<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pnh extends Seeder
{
    public function run()
    {
        DB::table('pnh')->insert([ 
            ['idpnh' => 'PNH01', 'idnhanvien' => 'NV01', 'idnhacungcap' => 'CTShouse', 'created_at' => date("Y-m-d H:i:s")],
            ['idpnh' => 'PNH02', 'idnhanvien' => 'NV01', 'idnhacungcap' => 'TMKC', 'created_at' => date("Y-m-d H:i:s")],
            ['idpnh' => 'PNH03', 'idnhanvien' => 'NV02', 'idnhacungcap' => 'HTD', 'created_at' => date("Y-m-d H:i:s")],
            ['idpnh' => 'PNH04', 'idnhanvien' => 'NV03', 'idnhacungcap' => 'CTShouse', 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
