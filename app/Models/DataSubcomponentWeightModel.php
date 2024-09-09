<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\DataMonthModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataSubcomponentWeightModel extends Model
{
    use HasFactory;
    protected $table = 'data_subcomponent_weight';
    protected $primaryKey = 'sw_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'sw_id',
        'sw_month',
        'sw_year',
        'sw_coverage',
        'sw_hc',
        'sw_payment',
        'sw_ffis',
        'sw_mom',
        'sw_daily_ops',
        'sw_ehs',
        'sw_training',
        'sw_stock_level',
        'sw_stock_count',
        'sw_product_handling',
        'sw_stock_rotation',
        'sw_sell_out',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->sw_id)) {
                $model->sw_id = self::generateUniqueId();
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
        return $this->belongsTo(DataMonthModel::class, 'sw_month', 'month_int');
    }
}
