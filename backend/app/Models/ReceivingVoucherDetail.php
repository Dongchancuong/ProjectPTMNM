<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivingVoucherDetail extends Model
{
    use HasFactory;
    
    protected $table='chitiet_pnh';
    protected $fillable=['idpnh','idsanpham','soluong'];
    protected $primaryKey = 'idpnh';
    public $incrementing = false;
    public function RVoucher(){
        return $this->belongsTo(ReceivingVoucher::class,'idpnh','idpnh');
    }
}