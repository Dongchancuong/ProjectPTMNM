<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    use HasFactory;
    protected $table='thuonghieu';
    protected $fillable=['idthuonghieu','tenthuonghieu','visible'];
    protected $primaryKey = 'idthuonghieu';
    public $incrementing = false;
    public function ProductDetail(){
        return $this->hasMany(ProductDetail::class,'idthuonghieu','idthuonghieu');
    }
}
