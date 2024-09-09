<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DataUserModel extends Authenticatable
{

    use HasFactory, Notifiable;
    
    protected $table = 'data_user';
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'user_id',
        'user_name',
        'user_last_name',
        'user_email',
        'password',
        'user_status',
        'user_access',
        'user_foto',
        'user_vailed',
        'created_date',
        'created_by',
    ];

    protected $hidden = [
        'password',
    ];
    
}