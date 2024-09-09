<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\DataMonthModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataMaincomponentWeightModel extends Model
{
    use HasFactory;
    protected $table = 'data_maincomponent_weight';
    protected $primaryKey = 'mw_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'mw_id',
        'mw_month',
        'mw_year',
        'mw_coverage',
        'mw_hc',
        'mw_payment',
        'mw_ffis',
        'mw_operation',
        'mw_stock',
        'created_date',
        'created_by',
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

    public function month()
    {
        return $this->belongsTo(DataMonthModel::class, 'mw_month', 'month_int');
    }
}