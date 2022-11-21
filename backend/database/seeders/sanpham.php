<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sanpham extends Seeder
{
    public function run()
    {
        DB::table('sanpham')->insert([ 
            ['idsanpham' => 'AE-1200WHD-1AVDF', 'idkhuyenmai' => 'CASIO_SALE01', 'idnhacungcap' => 'CTShouse', 'tensanpham' => 'Đồng hồ Casio AE-1200WHD-1AVDF', 'soluong' => 50, 'dongia' => 1308000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'NH8380-15E', 'idkhuyenmai' => 'CITIZEN_SALE01', 'idnhacungcap' => 'CTShouse', 'tensanpham' => 'Đồng hồ Citizen NH8380-15E', 'soluong' => 50, 'dongia' => 5800000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'MTD-100D-7A2VDF', 'idkhuyenmai' => 'CASIO_SALE01', 'idnhacungcap' => 'HNJ', 'tensanpham' => 'Đồng hồ Casio MTD-100D-7A2VDF', 'soluong' => 50, 'dongia' => 2491000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'SER02001W0', 'idkhuyenmai' => 'ORDER_CHRISTMAS', 'idnhacungcap' => 'HTD', 'tensanpham' => 'Đồng hồ Orient SER02001W0', 'soluong' => 50, 'dongia' => 7530000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'FS5532', 'idkhuyenmai' => 'ORDER_CHRISTMAS', 'idnhacungcap' => 'HTD', 'tensanpham' => 'Fossil FS5532', 'soluong' => 50, 'dongia' => 3650000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'T099.407.11.058.00', 'idkhuyenmai' => 'ORDER_CHRISTMAS', 'idnhacungcap' => 'TMKC', 'tensanpham' => 'Đồng hồ Tissot T099.407.11.058.00', 'soluong' => 50, 'dongia' => 23600000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'NH8363-14H', 'idkhuyenmai' => 'ORDER_HALLO01', 'idnhacungcap' => 'TMKC', 'tensanpham' => 'Đồng hồ Citizen NH8363-14H cũ, cam kết zin 100%, hàng còn rất mới, phụ kiện đầy đủ', 'soluong' => 50, 'dongia' => 5780000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'AW1370-51F', 'idkhuyenmai' => 'CITIZEN_SALE01', 'idnhacungcap' => 'TMKC', 'tensanpham' => 'Đồng hồ Citizen AW1370-51F', 'soluong' => 50, 'dongia' => 5080000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'SPC087P1', 'idkhuyenmai' => 'SEIKO_SALE02', 'idnhacungcap' => 'XNK', 'tensanpham' => 'Đồng hồ Seiko SPC087P1, Chronograph', 'soluong' => 50, 'dongia' => 6290000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'BJ6481-58E', 'idkhuyenmai' => 'CITIZEN_SALE01', 'idnhacungcap' => 'XNK', 'tensanpham' => 'Đồng hồ Citizen BJ6481-58E', 'soluong' => 50, 'dongia' => 7880000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'BGA-130-4BDR', 'idkhuyenmai' => 'ORDER_CHRISTMAS', 'idnhacungcap' => 'CTShouse', 'tensanpham' => 'Đồng hồ Baby-G BGA-130-4BDR','soluong'=>20, 'dongia' => '2791800', 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'L4.209.2.32.2', 'idkhuyenmai' => 'LONGINES_SALE01', 'idnhacungcap' => 'CTShouse', 'tensanpham' => 'Đồng hồ Longines L4.209.2.32.2','soluong'=>12, 'dongia' => 3500000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'DW00100314', 'idkhuyenmai' => 'BLACK_FRIDAY', 'idnhacungcap' => 'HNJ', 'tensanpham' => 'Đồng hồ Daniel Wellington DW00100314','soluong'=>10, 'dongia' => 2352000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'ER0182-59E', 'idkhuyenmai' => 'BLACK_FRIDAY', 'idnhacungcap' => 'XNK', 'tensanpham' => 'Đồng hồ nữ Citizen ER0182-59E','soluong'=>15, 'dongia' => 2100000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'SRKZ49P1', 'idkhuyenmai' => 'SEIKO_SALE02', 'idnhacungcap' => 'HTD', 'tensanpham' => 'Đồng hồ Seiko SRKZ49P1','soluong'=>10, 'dongia' => 4235000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'SKK883P1', 'idkhuyenmai' => 'SEIKO_SALE02', 'idnhacungcap' => 'TMKC', 'tensanpham' => 'Đồng hồ Seiko SKK883P1','soluong'=>11, 'dongia' => 7235000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => '96P214', 'idkhuyenmai' => 'ORDER_CHRISTMAS', 'idnhacungcap' => 'HTD', 'tensanpham' => 'Đồng hồ Bulova 96P214','soluong'=>13, 'dongia' => 3560000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'SRZ464P1', 'idkhuyenmai' => 'ORDER_CHRISTMAS', 'idnhacungcap' => 'XNK', 'tensanpham' => 'Đồng hồ Seiko SRZ464P1','soluong'=>10, 'dongia' => 4760000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'SNDV27P1', 'idkhuyenmai' => 'SEIKO_SALE02', 'idnhacungcap' => 'CTShouse', 'tensanpham' => 'Đồng hồ Seiko SNDV27P1','soluong'=>8, 'dongia' => 5760000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'C4572/1', 'idkhuyenmai' => 'BLACK_FRIDAY', 'idnhacungcap' => 'XNK', 'tensanpham' => 'Đồng hồ Candino C4572/1','soluong'=>7, 'dongia' => 3200000, 'created_at' => date("Y-m-d H:i:s")],
            ['idsanpham' => 'MK2779', 'idkhuyenmai' => 'BLACK_FRIDAY', 'idnhacungcap' => 'HTD', 'tensanpham' => 'Đồng hồ Michael Kors MK2779','soluong'=>12, 'dongia' => 8420000, 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
