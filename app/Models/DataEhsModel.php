<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataEhsModel extends Model
{
    use HasFactory;
    protected $table = 'data_ehs';
    protected $primaryKey = 'ehs_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'ehs_id',
        'distributor_id',
        'depo_id',
        'ehs_month',
        'ehs_year',
        'ec_name',
        'eb_id',
        'ehs_date',
        'ehs_konsekuensi',
        'ehs_probabilitas',
        'ehs_nilai_bahaya',
        'ehs_check',
        'ehs_verify',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->ehs_id)) {
                $model->ehs_id = self::generateUniqueId();
            }
        });
    }

    public static function generateUniqueId()
    {
        return substr(Str::uuid()->toString(), 0, 10);
    }

    
}