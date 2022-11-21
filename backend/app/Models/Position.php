<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = 'chucvu';
    protected $fillable = [
        'idchucvu',
        'tenchucvu',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'idchucvu';
    public $incrementing = false;

}
