<?php

namespace App\Models;

use App\Http\Resources\ReceivingVoucherDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivingVoucher extends Model
{
    use HasFactory;
    protected $table='pnh';
    protected $fillabel=['idpnh','idnhanvien','idnhacungcap','ngaynhap'];
    protected $primaryKey = 'idpnh';
    public $incrementing = false;
    public function detailvoucher(){
        return $this->belongsTo(ReceivingVoucherDetail::class,'foreign_key')->select(['idsanpham','soluong']);
    }
}
