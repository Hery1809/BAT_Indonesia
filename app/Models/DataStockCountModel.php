<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataStockCountModel extends Model
{
    use HasFactory;
    protected $table = 'data_stock_count';
    protected $primaryKey = 'sc_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'sc_id',
        'distributor_id',
        'depo_id',
        'sc_month',
        'sc_year',
        'sc_week',
        'sc_cigarette',
        'sc_description',
        'sc_cukai',
        'sc_bonus',
        'sc_date_production',
        'sc_date',
        'sc_rcs_value',
        'sc_case_value',
        'sc_slot_value',
        'sc_pack_value',
        'sc_status',
        'sc_remark',
        'sc_tot_pack',
        'sc_verify',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->sc_id)) {
                $model->sc_id = self::generateUniqueId();
            }
        });
    }

    public static function generateUniqueId()
    {
        return substr(Str::uuid()->toString(), 0, 10);
    }

    

}