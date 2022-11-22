<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class taikhoan extends Seeder
{
  public function run()
  {
    DB::table('users')->insert([ 
      ['idtaikhoan' => 'TK01', 'idchucvu' => 'QL', 'username' => 'admin1', 'password' => bcrypt(123456), 'email' => 'letanthanh049@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
      ['idtaikhoan' => 'TK02', 'idchucvu' => 'QL', 'username' => 'admin2', 'password' => bcrypt(123456), 'email' => 'cuong28394@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
      ['idtaikhoan' => 'TK03', 'idchucvu' => 'QL', 'username' => 'admin3', 'password' => bcrypt(123456), 'email' => 'ocbtmdkmgo392@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
      ['idtaikhoan' => 'TK04', 'idchucvu' => 'QL', 'username' => 'admin4', 'password' => bcrypt(123456), 'email' => 'camco2839@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
      ['idtaikhoan' => 'TK05', 'idchucvu' => 'NV_BH', 'username' => 'vannam47', 'password' => bcrypt(123456), 'email' => 'nguyenvana@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
      ['idtaikhoan' => 'TK06', 'idchucvu' => 'NV_CSKH', 'username' => 'nguyenvana283', 'password' => bcrypt(123456), 'email' => 'levanb@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
      ['idtaikhoan' => 'TK07', 'idchucvu' => 'NV_CSKH', 'username' => 'xuanbac23', 'password' => bcrypt(123456), 'email' => 'myle91@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
      ['idtaikhoan' => 'TK08', 'idchucvu' => 'NV_TN', 'username' => 'namcao34', 'password' => bcrypt(123456), 'email' => 'duyenneko@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
      ['idtaikhoan' => 'TK09', 'idchucvu' => 'NV_TN', 'username' => 'donkihote113', 'password' => bcrypt(123456), 'email' => 'minhhaZa2@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
      ['idtaikhoan' => 'TK10', 'idchucvu' => 'NV_BH', 'username' => 'vannam398', 'password' => bcrypt(123456), 'email' => 'khoatran283@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
      ['idtaikhoan' => 'TK11', 'idchucvu' => 'KH', 'username' => 'khoa1924', 'password' => bcrypt(123456), 'email' => 'vannam3728@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
      ['idtaikhoan' => 'TK12', 'idchucvu' => 'KH', 'username' => 'tuankiet293', 'password' => bcrypt(123456), 'email' => 'dvnam229@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
      ['idtaikhoan' => 'TK13', 'idchucvu' => 'KH', 'username' => 'abc293', 'password' => bcrypt(123456), 'email' => 'kiettt3z@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
      ['idtaikhoan' => 'TK14', 'idchucvu' => 'KH', 'username' => 'duyle283', 'password' => bcrypt(123456), 'email' => 'duyl29@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
      ['idtaikhoan' => 'TK15', 'idchucvu' => 'KH', 'username' => 'lannguyetm22', 'password' => bcrypt(123456), 'email' => 'lann352@gmail.com', 'created_at' => date("Y-m-d H:i:s")],
    ]);
  }
}
