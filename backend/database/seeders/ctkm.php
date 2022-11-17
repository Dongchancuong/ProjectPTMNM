<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ctkm extends Seeder
{
    public function run()
    {
        DB::table('ctkm')->insert([ 
            ['idkhuyenmai' => 'ORDER_HALLO01', 'tenchuongtrinh' => 'Ưu đãi mùa Halloween', 'giamgia' => 650000, 'mota' => 'Áp dụng cho các đơn hàng từ 5 triệu trở lên', 'ngaybatdau' => '2022-10-24', 'ngayketthuc' => '2022-10-31', 'created_at' => date("Y-m-d H:i:s")],
            ['idkhuyenmai' => 'ALL_CASIO-SALE01', 'tenchuongtrinh' => 'Sale lớn cùng Casio', 'giamgia' => 10, 'mota' => 'Áp dụng cho mọi loại sản phẩm thương hiệu Casio', 'ngaybatdau' => '2022-11-20', 'ngayketthuc' => '2022-12-31', 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
