<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table='giohang';
    protected $fillable=['id','idtaikhoan','idsanpham','soluong'];
    protected $primaryKey = 'idtaikhoan';
    public $incrementing = false;
}
