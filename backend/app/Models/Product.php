<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Product extends Model
{
    use HasFactory;
    protected $table='sanpham';
    protected $fillable = [
        'idsanpham',
        'idkhuyenmai',
        'idnhacungcap',
        'tensanpham',
        'soluong',
        'dongia',
        'visible',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'idsanpham';
    public $incrementing = false;
    public function ProductDetail(){
        return $this->hasOne(ProductDetail::class,'idsanpham','idsanpham');
    }
}
