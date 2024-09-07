<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataDepoModel extends Model
{
    use HasFactory;
    protected $table = 'data_depo';
    protected $primaryKey = 'depo_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'depo_id',
        'depo_name',
        'depo_region',
        'depo_retail',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->depo_id)) {
                $model->depo_id = self::generateUniqueId();
            }
        });
    }

    public static function generateUniqueId()
    {
        // Generate UUID dan ambil substring 10 karakter
        return substr(Str::uuid()->toString(), 0, 10);
    }
}
