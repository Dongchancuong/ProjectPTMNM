<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ctkm extends Seeder
{
    public function run()
    {
        DB::table('ctkm')->insert([ 
            ['idkhuyenmai' => 'ORDER_HALLO01', 'tenchuongtrinh' => 'Ưu đãi mùa Halloween', 'giamgia' => 25, 'ngaybatdau' => '2022-10-24', 'ngayketthuc' => '2022-10-31', 'created_at' => date("Y-m-d H:i:s")],
            ['idkhuyenmai' => 'CASIO_SALE01', 'tenchuongtrinh' => 'Sale cùng Casio', 'giamgia' => 25,  'ngaybatdau' => '2022-11-20', 'ngayketthuc' => '2022-11-30', 'created_at' => date("Y-m-d H:i:s")],
            ['idkhuyenmai' => 'CITIZEN_SALE01', 'tenchuongtrinh' => 'Sale cùng Citizen', 'giamgia' => 10, 'ngaybatdau' => '2022-11-11', 'ngayketthuc' => '2022-12-5', 'created_at' => date("Y-m-d H:i:s")],
            ['idkhuyenmai' => 'SEIKO_SALE02', 'tenchuongtrinh' => 'Sale cùng Seiko', 'giamgia' => 35, 'ngaybatdau' => '2022-12-10', 'ngayketthuc' => '2022-12-7', 'created_at' => date("Y-m-d H:i:s")],
            ['idkhuyenmai' => 'LONGINES_SALE01', 'tenchuongtrinh' => 'Sale lớn cùng Longines', 'giamgia' => 30, 'ngaybatdau' => '2022-12-9', 'ngayketthuc' => '2022-12-11', 'created_at' => date("Y-m-d H:i:s")],
            ['idkhuyenmai' => 'CASIO_SALE02', 'tenchuongtrinh' => 'Sale lớn cùng Casio', 'giamgia' => 35, 'ngaybatdau' => '2022-10-19', 'ngayketthuc' => '2022-11-11', 'created_at' => date("Y-m-d H:i:s")],
            ['idkhuyenmai' => 'ORDER_CHRISTMAS', 'tenchuongtrinh' => 'Ưu đãi nhân dịp Christmas', 'giamgia' => 35, 'ngaybatdau' => '2022-12-17', 'ngayketthuc' => '2022-12-22', 'created_at' => date("Y-m-d H:i:s")],
            ['idkhuyenmai' => 'BLACK_FRIDAY', 'tenchuongtrinh' => 'BlackFriday ưu đãi lớn', 'giamgia' => 50, 'ngaybatdau' => '2022-11-25', 'ngayketthuc' => '2022-11-25', 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
