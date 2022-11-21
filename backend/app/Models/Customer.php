<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'khachhang';
    protected $fillable = [
        'idkhachhang',
        'idtaikhoan',
        'hoten',
        'sdt',
        'diachi',
        'email',
        'tichluy',
        'capdo',
        'visible',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'idkhachhang';
    public $incrementing = false;
}
