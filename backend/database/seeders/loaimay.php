<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class loaimay extends Seeder
{
    public function run()
    {
        DB::table('loaimay')->insert([
            ['idloaimay' => 'QUARTZ', 'tenloaimay' => 'Quartz (Pin)', 'created_at' => date("Y-m-d H:i:s")],
            ['idloaimay' => 'AUTOMATIC', 'tenloaimay' => 'Automatic (Tự Động)', 'created_at' => date("Y-m-d H:i:s")],
            ['idloaimay' => 'MECHANICAL', 'tenloaimay' => 'Mechanical (Cơ học)', 'created_at' => date("Y-m-d H:i:s")],
            ['idloaimay' => 'SOLAR', 'tenloaimay' => 'Solar (pin mặt trời)', 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
