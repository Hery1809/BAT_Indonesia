<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataEhsFormModel extends Model
{
    use HasFactory;
    protected $table = 'data_ehs_form';
    protected $primaryKey = 'ef_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'ef_id',
        'ef_depo_id',
        'ef_distributor_id',
        'ef_month',
        'ef_year',
        'ef_date',
        'ef_verify',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->ef_id)) {
                $model->ef_id = self::generateUniqueId();
            }
        });

    }

    public static function generateUniqueId()
    {
        return substr(Str::uuid()->toString(), 0, 10);
    }

    

}