<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineType extends Model
{
    use HasFactory;
    protected $table='loaimay';
    protected $fillable=['idloaimay','tenloaimay','visible'];
    protected $primaryKey = 'idloaimay';
    public $incrementing = false;
}
