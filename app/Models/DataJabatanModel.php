<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataJabatanModel extends Model
{
    use HasFactory;
    protected $table = 'data_jabatan';
    protected $primaryKey = 'jabatan_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'jabatan_id',
        'jabatan_name',
        'jabatan_target_join_call',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->jabatan_id)) {
                $model->jabatan_id = self::generateUniqueId();
            }
        });
    }

    public static function generateUniqueId()
    {
        return substr(Str::uuid()->toString(), 0, 10);
    }
}
