<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionDetail extends Model
{
    use HasFactory;
    protected $table = 'chitiet_chucvu';
    protected $fillable = [
        'idchucvu',
        'idchucnang'
    ];
}