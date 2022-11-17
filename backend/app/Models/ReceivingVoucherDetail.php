<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivingVoucherDetail extends Model
{
    use HasFactory;
    
    protected $table='pnh';
    protected $fillabel=['idpnh','idsanpham','soluong'];
    protected $primaryKey = 'idpnh';
    public $incrementing = false;
}
