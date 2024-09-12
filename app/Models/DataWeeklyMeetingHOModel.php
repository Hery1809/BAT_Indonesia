<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWeeklyMeetingHOModel extends Model
{
    use HasFactory;

    protected $table = 'data_meeting_weekly';
    protected $primaryKey = 'mw_id';
    public $timestamps = false;

    protected $fillable = [
        'distributor_id',
        'depo_id',
        'mw_month',
        'mw_year',
        'mw_week',
        'mw_date',
        'mw_target',
        'mw_actual',
        'mw_plan',
        'mw_timeline',
        'mw_verify',
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
        return $this->belongsTo(DataStatusModel::class, 'mw_verify', 'status_id');
    }

    public function getStatusForWeek($week)
    {
        $weekData = self::where('mw_week', $week)
            ->where('distributor_id', $this->distributor_id)
            ->where('depo_id', $this->depo_id)
            ->where('mw_month', $this->mw_month)
            ->where('mw_year', $this->mw_year)
            ->first();

        if ($weekData && $weekData->status) {
            return $weekData->status->status_name;
        }

        return 'not started';
    }
}
