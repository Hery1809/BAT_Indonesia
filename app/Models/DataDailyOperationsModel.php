<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataDailyOperationsModel extends Model
{
    use HasFactory;
    protected $table = 'data_daily_operations';
    protected $primaryKey = 'do_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'do_id',
        'distributor_id',
        'depo_id',
        'jabatan_id',
        'do_month',
        'do_year',
        'do_week',
        'do_date',
        'do_name',
        'do_tim',
        'do_target_call',
        'do_join_call',
        'do_control_call',
        'do_verify',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->do_id)) {
                $model->do_id = self::generateUniqueId();
            }
        });
    }

    public static function generateUniqueId()
    {
        return substr(Str::uuid()->toString(), 0, 10);
    }

    

}