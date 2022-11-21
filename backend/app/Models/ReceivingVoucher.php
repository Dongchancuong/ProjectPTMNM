<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivingVoucher extends Model
{
    use HasFactory;
    protected $table='pnh';
    protected $fillable=['idpnh','idnhanvien','idnhacungcap'];
    protected $primaryKey = 'idpnh';
    public $incrementing = false;
    public function RVoucherDetail(){
        return $this->hasMany(ReceivingVoucherDetail::class,'idpnh','idpnh');
    }
}