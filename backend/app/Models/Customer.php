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
        'hoten',
        'sdt',
        'diachi',
        'email',
        'tichluy',
        'capdo',
        'created_at',
        'updated_at'
    ];
}
