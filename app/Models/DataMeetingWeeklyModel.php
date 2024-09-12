<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMeetingWeeklyModel extends Model
{
    use HasFactory;
    protected $table = 'data_meeting_weekly';
    protected $primaryKey = 'mw_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'ditributor_id',
        'depo_id',
        'mw_month',
        'mw_year',
        'mw_week',
        'mcw_id',
        'mw_date',
        'mw_target',
        'mw_actual',
        'mw_plan',
        'mw_timeline',
        'mw_verify',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->mw_id)) {
                $model->mw_id = self::generateUniqueId();
            }
        });
    }

    public static function generateUniqueId()
    {
        // Generate UUID dan ambil substring 10 karakter
        return substr(Str::uuid()->toString(), 0, 10);
    }

    // Relasi dengan model DataDistributorModel
    public function distributor()
    {
        return $this->belongsTo(DataDistributorModel::class, 'distributor_id', 'distributor_id');
    }

    // Relasi dengan DataDepoModel
    public function depo()
    {
        return $this->belongsTo(DataDepoModel::class, 'depo_id', 'depo_id');
    }

    // Relasi dengan DataMonthModel
    public function month()
    {
        return $this->belongsTo(DataMonthModel::class, 'mw_month', 'month_int');
    }

    // Relasi dengan DataWeekModel
    public function week()
    {
        return $this->belongsTo(DataWeekModel::class, 'mw_week', 'week_int');
    }

    // Relasi dengan DataStatusModel
    public function status()
    {
        return $this->belongsTo(DataStatusModel::class, 'mw_verify', 'status_id');
    }

    
}