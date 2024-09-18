<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataHeadcountModel extends Model
{
    use HasFactory;
    protected $table = 'data_headcount_fulfilment';
    protected $primaryKey = 'hf_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'hf_id',
        'distributor_id',
        'depo_id',
        'position_id',
        'hf_month',
        'hf_year',
        'hf_week',
        'hf_value',
        'hf_date',
        'hf_status',
        'hf_verify',
        'created_date',
        'created_by',
    ];


    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->jabatan_id)) {
                $model->jabatan_id = self::generateUniqueId();
            }
        });
    }

    public static function generateUniqueId()
    {
        return substr(Str::uuid()->toString(), 0, 10);
    }

}