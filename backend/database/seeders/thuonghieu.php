<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class thuonghieu extends Seeder
{
    public function run()
    {
        DB::table('thuonghieu')->insert([
            ['idthuonghieu' => 'CITIZEN', 'tenthuonghieu' => 'Citizen', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'CASIO', 'tenthuonghieu' => 'Casio', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'GUCCI', 'tenthuonghieu' => 'Gucci', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'EMPORIO_ARMANI', 'tenthuonghieu' => 'Emporio Armani', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'MICHAEL_KORS', 'tenthuonghieu' => 'Michael Kors', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'TISSOT', 'tenthuonghieu' => 'Tissot', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'OLIVIA_BURTON', 'tenthuonghieu' => 'Olivia Burton', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'FOSSIL', 'tenthuonghieu' => 'Fossil', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'SWATCH', 'tenthuonghieu' => 'Swatch', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'SEKONDA', 'tenthuonghieu' => 'Senkonda', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'ORIENT', 'tenthuonghieu' => 'Orient', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'LONGINES', 'tenthuonghieu' => 'Longines', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'DANIEL_WELLINGTON', 'tenthuonghieu' => 'Daniel Wellington', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'CALVIN_KLEIN', 'tenthuonghieu' => 'Calvin Klein', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'BULOVA', 'tenthuonghieu' => 'Bulova', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'CANDINO', 'tenthuonghieu' => 'Candino', 'created_at' => date("Y-m-d H:i:s")],
            ['idthuonghieu' => 'SEIKO', 'tenthuonghieu' => 'Seiko', 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
