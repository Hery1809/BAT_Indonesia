<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class DataTrainingModel extends Model
{
    use HasFactory;
    protected $table = 'data_training';
    protected $primaryKey = 't_id';
    public $incrementing = false;
    protected $fillable = [
        'distributor_id',
        'depo_id',
        't_month', 
        't_year',
        'position_id',
        't_name',
        't_judul',
        't_date',
        't_verify',
        't_nomor',
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
        // Generate UUID dan ambil substring 10 karakter
        return substr(Str::uuid()->toString(), 0, 10);
    }

    public function distributor()
    {
        return $this->belongsTo(DataDistributorModel::class, 'distributor_id', 'distributor_id');
    }
    
    public function depo()
    {
        return $this->belongsTo(DataDepoModel::class, 'depo_id', 'depo_id');
    }

    // Perbarui relasi untuk menggunakan kolom yang benar
    public function month()
    {
        return $this->belongsTo(DataMonthModel::class, 't_month', 'month_int');
    }
    public function status()
    {
        return $this->belongsTo(DataStatusModel::class, 't_verify', 'status_id');
    }
}
