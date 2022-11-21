<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table='mausac';
    protected $fillable=['idmau','tenmau','visible'];
    protected $primaryKey = 'idmau';
    public $incrementing = false;
    public function ProductDetail(){
        return $this->hasMany(ProductDetail::class,'idmau','idmau');
    }
}
