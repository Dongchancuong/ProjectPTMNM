<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'taikhoan';
    protected $fillable = [
        'idtaikhoan',
        'idchucvu',
        'tentaikhoan',
        'matkhau',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'idtaikhoan';
    public $incrementing = false;
}
