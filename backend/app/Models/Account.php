<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Account as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Account extends Model
{
    use HasFactory;
    protected $table = 'taikhoan';
    protected $fillable = [
        'idtaikhoan',
        'idchucvu',
        'tentaikhoan',
        'matkhau',
        'visible',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'idtaikhoan';
    public $incrementing = false;
}
