<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'nhanvien';
    protected $fillable = [
        'idnhanvien',
        'idtaikhoan',
        'hoten',
        'gioitinh',
        'ngaysinh',
        'sdt',
        'diachi',
        'email',
        'ngayvaolam',
        'luong',
        'visible',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'idnhanvien';
    public $incrementing = false;
}
