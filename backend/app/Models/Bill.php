<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'hoadon';
    protected $fillable = [
        'idkhuyenmai',
        'idnhanvien',
        'hoten',
        'diachi',
        'sdt',
        'email',
        'tonggia',
        'soluong',
        'ngaylap',
    ];
}