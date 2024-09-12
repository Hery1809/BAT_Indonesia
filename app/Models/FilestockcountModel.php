<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FilestockcountModel extends Model
{
    use HasFactory;
    protected $table = 'data_stock_count_attachment';
    protected $primaryKey = 'sca_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'sca_id',
        'distributor_id',
        'depo_id',
        'sca_month',
        'sca_year',
        'sca_week',
        'sca_file',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->sca_id)) {
                $model->sca_id = self::generateUniqueId();
            }
        });
    }

    public static function generateUniqueId()
    {
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

    public function user()
    {
        return $this->belongsTo(DataUserModel::class, 'created_by', 'user_id');
    }

    

}