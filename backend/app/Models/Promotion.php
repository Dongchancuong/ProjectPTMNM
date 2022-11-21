<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'ctkm';
    protected $fillable=[
        'idkhuyenmai',
        'giamgia',
        'mota',
        'ngaybatdau',
        'ngayketthuc',
        'created_at',
        'updated_at'
    ];
    public function Product(){
        return $this->hasMany(Promotion::class,'idkhuyennmai','idkhuyennmai');
    }
}
