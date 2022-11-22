<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       // \App\Models\User::factory(10)->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(mausac::class);
        $this->call(thuonghieu::class);
        $this->call(chatlieu::class);
        $this->call(loaimay::class);
        $this->call(chucnang::class);
        $this->call(chucvu::class);
        $this->call(chitiet_chucvu::class);
        $this->call(taikhoan::class);
        $this->call(nhanvien::class);
        $this->call(khachhang::class);
        $this->call(nhacungcap::class);
        $this->call(ctkm::class);
        $this->call(sanpham::class);
        $this->call(chitiet_sanpham::class);
        $this->call(pnh::class);
        $this->call(chitiet_pnh::class);
        $this->call(hoadon::class);
        $this->call(chitiet_hd::class);
        $this->call(giohang::class);
    }
}
