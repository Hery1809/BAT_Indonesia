<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataStockLevelModel extends Model
{
    use HasFactory;
    protected $table = 'data_stock_level';
    protected $primaryKey = 'sl_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'sl_id',
        'distributor_id',
        'depo_id',
        'sl_month',
        'sl_year',
        'sl_week',
        'sl_cigarette',
        'sl_value',
        'sl_date',
        'sl_policy',
        'sl_verify',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->sl_id)) {
                $model->sl_id = self::generateUniqueId();
            }
        });
    }

    public static function generateUniqueId()
    {
        return substr(Str::uuid()->toString(), 0, 10);
    }



}