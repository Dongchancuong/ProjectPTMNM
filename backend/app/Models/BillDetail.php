<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $table = 'chitiet_hd';
    protected $fillable = [
        'idhoadon',
        'idsanpham',
        'soluong',
        'dongia',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'idhoadon';
    public $incrementing = false;
}
