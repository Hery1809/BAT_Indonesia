<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataDistributorDepoModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataDistributorModel extends Model
{
    use HasFactory;
    protected $table = 'data_distributor';
    protected $primaryKey = 'distributor_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'distributor_id',
        'distributor_name',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->distributor_id)) {
                $model->distributor_id = self::generateUniqueId();
            }
        });
    }

    public static function generateUniqueId()
    {
        return substr(Str::uuid()->toString(), 0, 10);
    }

    public function distributorDepos()
    {
        return $this->hasMany(DataDistributorDepoModel::class, 'distributor_id', 'distributor_id');
    }
}
