<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\DataMonthModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataCalendarModel extends Model
{
    use HasFactory;
    protected $table = 'data_calendar';
    protected $primaryKey = 'calendar_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'calendar_id',
        'c_year',
        'c_month',
        'c_start_week',
        'c_end_week',
        'c_number_week',
        'c_start_date',
        'c_end_date',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->calendar_id)) {
                $model->calendar_id = self::generateUniqueId();
            }
        });
    }

    public static function generateUniqueId()
    {
        return substr(Str::uuid()->toString(), 0, 10);
    }

    public function month()
    {
        return $this->belongsTo(DataMonthModel::class, 'c_month', 'month_int');
    }
}
