<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $table='pdh';
    protected $fillable=[
        'idphieudh',
        'idkhuyenmai',
        'hoten',
        'sdt',
        'email',
        'diachi',
        'tonggia',
        'ngaylap',
        'tinhtrang'
    ];
    protected $primaryKey = 'idphieudh';
    public $incrementing = false;
}
