<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\DataDepoModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataDistributorDepoModel extends Model
{
    use HasFactory;
    protected $table = 'data_distributor_depo';
    protected $primaryKey = 'distributor_depo_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'distributor_depo_id',
        'distributor_id',
        'depo_id',
    ];
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->distributor_depo_id)) {
                $model->distributor_depo_id = self::generateUniqueId();
            }
        });
    }

    public static function generateUniqueId()
    {
        return substr(Str::uuid()->toString(), 0, 10);
    }

    public function depo()
    {
        return $this->belongsTo(DataDepoModel::class, 'depo_id', 'depo_id');
    }
}
