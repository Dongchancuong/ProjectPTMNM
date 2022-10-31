<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'khachhang';
    protected $fillable = [
        'hoten',
        'sdt',
        'diachi',
        'email',
        'doanhso',
        'capdo'
    ];
}
