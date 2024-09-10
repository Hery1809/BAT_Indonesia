<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataActivityUserModel extends Model
{
    use HasFactory;
    protected $table = 'data_logs';
    protected $primaryKey = 'logs_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'logs_id',
        'user_id',
        'ip_address',
        'ip_address_utama',
        'mac_address',
        'perangkat',
        'browser',
        'action',
        'created_date',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->activity_user_id)) {
                $model->activity_user_id = self::generateUniqueId();
            }
        });
    }

    public static function generateUniqueId()
    {
        return substr(Str::uuid()->toString(), 0, 10);
    }

    public function user ()
    {
        return $this->belongsTo(DataUserModel::class, 'user_id', 'user_id');
    }





}