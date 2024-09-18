<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataCoverageModel extends Model
{
    use HasFactory;
    protected $table = 'data_coverage';
    protected $primaryKey = 'c_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'c_id',
        'distributor_id',
        'depo_id',
        'c_month',
        'c_year',
        'c_week',
        'c_date',
        'c_retail',
        'c_ws',
        'c_others',        
        'c_verify',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->c_id)) {
                $model->c_id = self::generateUniqueId();
            }
        });
    }

    public static function generateUniqueId()
    {
        return substr(Str::uuid()->toString(), 0, 10);
    }

    
}