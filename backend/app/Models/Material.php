<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table='chatlieu';
    protected $fillable=['idchatlieu','tenchatlieu','visible'];
    protected $primaryKey = 'idchatlieu';
    public $incrementing = false;
}
