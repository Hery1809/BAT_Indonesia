<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataTrainingModel extends Model
{
    use HasFactory;
    protected $table = 'data_training';
    protected $primaryKey = 't_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        't_id',
        'depo_id',
        'distributor_id',
        't_month',
        't_year',
        'position_id',
        't_name',
        't_judul',
        't_nomor',
        't_date',
        't_verify',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->t_id)) {
                $model->t_id = self::generateUniqueId();
            }
        });

    }

    public static function generateUniqueId()
    {
        return substr(Str::uuid()->toString(), 0, 10);
    }

    

}