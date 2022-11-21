<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'hoadon';
    protected $fillable = [
        'idhoadon',
        'idkhachhang',
        'idkhuyenmai',
        'idnhanvien',
        'hoten',
        'diachi',
        'sdt',
        'email',
        'tonggia',
        'soluong',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'idhoadon';
    public $incrementing = false;
}
