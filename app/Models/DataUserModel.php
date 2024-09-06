<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class DataUserModel extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;
    protected $table = 'data_user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id',
        'user_name',
        'user_last_name',
        'user_email',
        'user_password',
        'user_status',
        'user_access',
        'user_foto',
        'user_vailed',
        'created_date',
        'created_by',
    ];
}