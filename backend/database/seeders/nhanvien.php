<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nhanvien extends Seeder
{

public function run(){
DB::table('nhanvien')->insert([ 
    ['idnhanvien' => 'NV01', 'idtaikhoan' => 'TK01', 'hoten' => 'Lê Tấn Thành', 'gioitinh' => 'Nam', 'ngaysinh' => '1984-05-10', 'sdt' => '07775807677', 
    'diachi' => '123 Nguyễn Trãi', 'email' => 'letanthanh049@gmail.com', 'ngayvaolam' => '2016-10-13', 'luong' => '7500000', 'created_at' => date("Y-m-d H:i:s")],
    ['idnhanvien' => 'NV02', 'idtaikhoan' => 'TK02', 'hoten' => 'Đổng Chấn Cường', 'gioitinh' => 'Nam', 'ngaysinh' => '1984-11-13', 'sdt' => '0982113114', 
    'diachi' => '456 Nguyễn Văn Cừ', 'email' => 'cuong28394@gmail.com', 'ngayvaolam' => '2016-10-13', 'luong' => '8000000', 'created_at' => date("Y-m-d H:i:s")],
    ['idnhanvien' => 'NV03', 'idtaikhoan' => 'TK03', 'hoten' => 'Bùi Phước Hải', 'gioitinh' => 'Nam', 'ngaysinh' => '1980-05-22', 'sdt' => '0907312467', 
    'diachi' => '12 Lê Văn Sỹ', 'email' => 'ocbtmdkmgo392@gmail.com', 'ngayvaolam' => '2016-10-13', 'luong' => '13000000', 'created_at' => date("Y-m-d H:i:s")],
    ['idnhanvien' => 'NV04', 'idtaikhoan' => 'TK04', 'hoten' => 'Huỳnh Cẩm Cơ', 'gioitinh' => 'Nam', 'ngaysinh' => '1993-06-17', 'sdt' => '0907123456', 
    'diachi' => '15 Nguyễn Công Trứ', 'email' => 'camco2839@gmail.com', 'ngayvaolam' => '2016-10-13', 'luong' => '7500000', 'created_at' => date("Y-m-d H:i:s")],
    ['idnhanvien' => 'NV05', 'idtaikhoan' => 'TK05', 'hoten' => 'Nguyễn Văn An', 'gioitinh' => 'Nam', 'ngaysinh' => '1994-08-24', 'sdt' => '0973124356', 
    'diachi' => '80/21 Lý Thái Tổ', 'email' => 'nguyenvana@gmail.com', 'ngayvaolam' => '2016-10-13', 'luong' => '7500000', 'created_at' => date("Y-m-d H:i:s")],
    ['idnhanvien' => 'NV06', 'idtaikhoan' => 'TK06', 'hoten' => 'Lê Thanh Hà', 'gioitinh' => 'Nam', 'ngaysinh' => '2000-09-01', 'sdt' => '0779806373', 
    'diachi' => '36/49 Lê Lợi', 'email' => 'levanb@gmail.com', 'ngayvaolam' => '2016-10-13', 'luong' => '7500000', 'created_at' => date("Y-m-d H:i:s")],
    ['idnhanvien' => 'NV07', 'idtaikhoan' => 'TK07', 'hoten' => 'Trần Tuệ Mỹ', 'gioitinh' => 'Nữ', 'ngaysinh' => '1997-04-10', 'sdt' => '0907010228', 
    'diachi' => '245 Nguyễn Văn Tần', 'email' => 'myle91@gmail.com', 'ngayvaolam' => '2016-10-13', 'luong' => '7500000', 'created_at' => date("Y-m-d H:i:s")],
    ['idnhanvien' => 'NV08', 'idtaikhoan' => 'TK08', 'hoten' => 'Cao Mỹ Duyên', 'gioitinh' => 'Nữ', 'ngaysinh' => '1995-07-07', 'sdt' => '0907115228', 
    'diachi' => '13/30 CMT8', 'email' => 'duyenneko@gmail.com', 'ngayvaolam' => '2016-10-13', 'luong' => '7500000', 'created_at' => date("Y-m-d H:i:s")],
    ['idnhanvien' => 'NV09', 'idtaikhoan' => 'TK09', 'hoten' => 'Đặng Trung Tính', 'gioitinh' => 'Nam', 'ngaysinh' => '1999-01-13', 'sdt' => '0907737248', 
    'diachi' => '104 Võ Thị Sáu', 'email' => 'minhhaZa2@gmail.com', 'ngayvaolam' => '2016-10-13', 'luong' => '7500000', 'created_at' => date("Y-m-d H:i:s")],
    ['idnhanvien' => 'NV10', 'idtaikhoan' => 'TK10', 'hoten' => 'Dương Văn Nam', 'gioitinh' => 'Nam', 'ngaysinh' => '2000-08-14', 'sdt' => '0983101202', 
    'diachi' => '348 Trần Hưng Đạo', 'email' => 'vannam3728@gmail.com', 'ngayvaolam' => '2016-10-13', 'luong' => '7500000', 'created_at' => date("Y-m-d H:i:s")],
]);
}

}