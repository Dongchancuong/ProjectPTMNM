<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $table='chitiet_sanpham';
    protected $fillable=[
        'idsanpham',
        'idthuonghieu',
        'idmau',
        'idloaimay',
        'idchatlieu',
        'gioitinh',
        'xuatxu',
        'mota',
        'anh'
    ];
    protected $primaryKey = 'idsanpham';
    public $incrementing = false;
    public function Trademask(){
        return $this->belongsTo(Trademark::class,'idthuonghieu','idsanpham');
    }
    public function color()
    {
        return $this->belongsTo(Color::class,'idmau','idsanpham');
    } 
    public function machinetype()
    {
        return $this->belongsTo(MachineType::class,'idloaimay','idsanpham');
    }
    public function material()
    {
        return $this->belongsTo(Material::class,'idchatlieu','idsanpham');
    }
}
