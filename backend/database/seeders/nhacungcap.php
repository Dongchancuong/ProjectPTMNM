<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nhacungcap extends Seeder
{
    public function run()
    {
        DB::table('nhacungcap')->insert([ 
            ['idnhacungcap' => 'CTShouse', 'tennhacungcap' => 'Công Ty CP Shouse Việt Nam ', 'diachi' => 'Tầng 12,TNR Tower,54A Nguyễn Chí Thanh, Q. Đống Đa,Hà Nội', 
            'email' => 'kinhdoanh.shouse@gmail.com', 'sdt' => '0911118821', 'created_at' => date("Y-m-d H:i:s")],
            ['idnhacungcap' => 'HNJ', 'tennhacungcap' => 'Cửa Hàng Đồng Hồ Cao Cấp HNJ', 'diachi' => '31 Nguyễn Tất Thành, P. 13, Q. 4,Tp. Hồ Chí Minh', 
            'email' => 'hnjvinawatch@gmail.com', 'sdt' => '0913665513', 'created_at' => date("Y-m-d H:i:s")],
            ['idnhacungcap' => 'XNK', 'tennhacungcap' => 'Công Ty TNHH Thương Mại Dịch Vụ XNK Đức Hạnh', 'diachi' => 'Tổ 1 Kp3, Đường Trần Thị Ngần, TT. Củ Chi, H. Củ Chi,Tp. Hồ Chí Minh', 
            'email' => 'anh2t2004h@gmail.com', 'sdt' => '02837924470', 'created_at' => date("Y-m-d H:i:s")],
            ['idnhacungcap' => 'HTD', 'tennhacungcap' => 'CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ ĐỒNG HỒ TUẤN ĐẠT', 'diachi' => '119/34 An Dương Vương, P. An Lạc, Q. Bình Tân, Tp. Hồ Chí Minh', 
            'email' => 'donghotuandat@gmail.com', 'sdt' => '0938609989', 'created_at' => date("Y-m-d H:i:s")],
            ['idnhacungcap' => 'TMKC', 'tennhacungcap' => 'CÔNG TY TNHH ĐẦU TƯ SẢN XUẤT THƯƠNG MẠI KIM CƯƠNG', 'diachi' => '774/17 Quang Trung, P. 8, Q. Gò Vấp, Tp. Hồ Chí Minh', 
            'email' => 'quathuonghieu@gmail.com', 'sdt' => '0969 919 439', 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
