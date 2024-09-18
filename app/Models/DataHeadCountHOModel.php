<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataHeadCountHOModel extends Model
{
    use HasFactory;

    protected $table = 'data_headcount_fulfilment';
    protected $primaryKey = 'hf_id';
    public $timestamps = false;

    protected $fillable = [
        'hf_id',
        'distributor_id',
        'depo_id',
        'position_id',
        'hf_month',
        'hf_year',
        'hf_week',
        'hf_value',
        'hf_date',
        'hf_status',
        'hf_verify',
    ];

    public function distributor()
    {
        return $this->belongsTo(DataDistributorModel::class, 'distributor_id');
    }

    public function depo()
    {
        return $this->belongsTo(DataDepoModel::class, 'depo_id');
    }

    public function status()
    {
        return $this->belongsTo(DataStatusModel::class, 'hf_status', 'status_id');
    }

    public function getStatusForWeek($week)
    {
        $weekData = self::where('hf_week', $week)
            ->where('distributor_id', $this->distributor_id)
            ->where('depo_id', $this->depo_id)
            ->where('hf_month', $this->hf_month)
            ->where('hf_year', $this->hf_year)
            ->first();

        if ($weekData && $weekData->status) {
            return $weekData->status->status_name;
        }

        return 'not started';
    }
}
