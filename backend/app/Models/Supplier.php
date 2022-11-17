<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table='nhacungcap';
    protected $fillable=['idnhacungcap','tennhacungcap','diachi','email','sdt','visible'];
    protected $primaryKey = 'idnhacungcap';
    public $incrementing = false;
}
