<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataFfisPaymentModel extends Model
{
    use HasFactory;
    protected $table = 'data_ffis_payment';
    protected $primaryKey = 'ffis_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'ffis_id',
        'depo_id',
        'distributor_id',
        'ffis_month',
        'ffis_year',
        'ffis_date',
        'ffis_verify',
        'ffis_date_max',
        'ffis_name_id',
        'ffis_name',
        'ffis_jabatan',
        'ffis_gross_pph',
        'ffis_pot_pph',
        'ffis_nett_pph',
        'ffis_insentif',
        'ffis_insentif_terima',
        'ffis_date_terima',
        'ffis_status_terima',
        'ffis_status_comply',
        'ffis_nomor',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->ffis_id)) {
                $model->ffis_id = self::generateUniqueId();
            }
        });

    }

    public static function generateUniqueId()
    {
        return substr(Str::uuid()->toString(), 0, 10);
    }


}