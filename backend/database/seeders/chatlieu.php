<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chatlieu extends Seeder
{
    public function run()
    {
        DB::table('chatlieu')->insert([ 
            ['idchatlieu' => 'DA', 'tenchatlieu' => 'Da', 'created_at' => date("Y-m-d H:i:s")],
            ['idchatlieu' => 'CAOSU', 'tenchatlieu' => 'Cao su', 'created_at' => date("Y-m-d H:i:s")],
            ['idchatlieu' => 'NHUA', 'tenchatlieu' => 'Nhựa', 'created_at' => date("Y-m-d H:i:s")],
            ['idchatlieu' => 'CERAMIC', 'tenchatlieu' => 'Ceramic', 'created_at' => date("Y-m-d H:i:s")],
            ['idchatlieu' => 'TITANIUM', 'tenchatlieu' => 'Titanium', 'created_at' => date("Y-m-d H:i:s")],
            ['idchatlieu' => 'CRYSTAL', 'tenchatlieu' => 'Pha lê (Kính Chống Trầy)', 'created_at' => date("Y-m-d H:i:s")],
            ['idchatlieu' => 'SAPPHIRE', 'tenchatlieu' => 'Sapphire (Kính Chống Trầy)', 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
