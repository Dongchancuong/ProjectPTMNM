<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chitiet_pdh extends Seeder
{
    public function run()
    {
        DB::table('chitiet_pdh')->insert([ 
            ['idphieudh' => 'PDH01', 'idsanpham' => 'ER0182-59E', 'soluong' => 1, 'dongia' => 2100000, 'created_at' => date("Y-m-d H:i:s")],
            ['idphieudh' => 'PDH01', 'idsanpham' => 'T099.407.11.058.00', 'soluong' => 1, 'dongia' => 2360000, 'created_at' => date("Y-m-d H:i:s")],
            ['idphieudh' => 'PDH01', 'idsanpham' => 'MTD-100D-7A2VDF', 'soluong' => 1, 'dongia' => 2491000, 'created_at' => date("Y-m-d H:i:s")],
            ['idphieudh' => 'PDH02', 'idsanpham' => 'AE-1200WHD-1AVDF', 'soluong' => 1, 'dongia' => 1308000, 'created_at' => date("Y-m-d H:i:s")],
            ['idphieudh' => 'PDH02', 'idsanpham' => 'NH8380-15E', 'soluong' => 1, 'dongia' => 5800000, 'created_at' => date("Y-m-d H:i:s")],
            ['idphieudh' => 'PDH03', 'idsanpham' => 'AE-1200WHD-1AVDF', 'soluong' => 2, 'dongia' => 2616000, 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
