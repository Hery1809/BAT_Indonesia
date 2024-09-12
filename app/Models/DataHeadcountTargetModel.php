<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\DataPositionModel;
use App\Models\DataDistributorModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataHeadcountTargetModel extends Model
{
    use HasFactory;
    protected $table = 'data_headcount_target_hc';
    protected $primaryKey = 'hth_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'hth_id',
        'distributor_id',
        'depo_id',
        'position_id',
        'hth_year',
        'hth_month',
        'hth_value',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->hth_id)) {
                $model->hth_id = self::generateUniqueId();
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

    public function position()
    {
        return $this->belongsTo(DataPositionModel::class, 'position_id', 'position_id');
    }
}