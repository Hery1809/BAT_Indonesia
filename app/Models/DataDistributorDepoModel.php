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

    public function distributor()
    {
        return $this->belongsTo(DataDistributorModel::class, 'distributor_id', 'distributor_id');
    }

    public function meetingweekly($week,$month,$year,$depot_id)
    
    {
        return $this->hasMany(DataMeetingWeeklyModel::class, 'distributor_id', 'distributor_id')
                    ->where('mw_week', $week)
                    ->where('mw_month', $month)
                    ->where('mw_year', $year)                    
                    ->where('depo_id', $depot_id);    

    }


    public function headcount($week,$month,$year,$depot_id)
    
    {
        return $this->hasMany(DataHeadcountModel::class, 'distributor_id', 'distributor_id')
                    ->where('hf_week', $week)
                    ->where('hf_month', $month)
                    ->where('hf_year', $year)                    
                    ->where('depo_id', $depot_id);    

    }

    public function coverage($week,$month,$year,$depot_id)
    
    {
        return $this->hasMany(DataCoverageModel::class, 'distributor_id', 'distributor_id')
                    ->where('c_week', $week)
                    ->where('c_month', $month)
                    ->where('c_year', $year)                    
                    ->where('depo_id', $depot_id);    

    }


    public function stocklevel($week,$month,$year,$depot_id)
    
    {
        return $this->hasMany(DataStockLevelModel::class, 'distributor_id', 'distributor_id')
                    ->where('sl_week', $week)
                    ->where('sl_month', $month)
                    ->where('sl_year', $year)                    
                    ->where('depo_id', $depot_id);    

    }

    public function stockcount($week,$month,$year,$depot_id)
    
    {
        return $this->hasMany(DataStockCountModel::class, 'distributor_id', 'distributor_id')
                    ->where('sc_week', $week)
                    ->where('sc_month', $month)
                    ->where('sc_year', $year)                    
                    ->where('depo_id', $depot_id);    

    }


    public function dailyoperations($week,$month,$year,$depot_id)
    
    {
        return $this->hasMany(DataDailyOperationsModel::class, 'distributor_id', 'distributor_id')
                    ->where('do_week', $week)
                    ->where('do_month', $month)
                    ->where('do_year', $year)                    
                    ->where('depo_id', $depot_id);    

    }

    public function ehs($ec_name,$month,$year,$depot_id)
    
    {
        return $this->hasMany(DataEhsModel::class, 'distributor_id', 'distributor_id')
                    ->where('ehs_month', $month)
                    ->where('ehs_year', $year) 
                    ->where('ec_name', $ec_name) 
                    ->where('depo_id', $depot_id);   

    }


    public function ehsform($month,$year,$depot_id)
    
    {
        return $this->hasMany(DataEhsFormModel::class, 'distributor_id', 'distributor_id')
                    ->where('ef_month', $month)
                    ->where('ef_year', $year) 
                    ->where('depo_id', $depot_id);   

    }

    public function training($month,$year,$depot_id)
    
    {
        return $this->hasMany(DataTrainingModel::class, 'distributor_id', 'distributor_id')
                    ->where('t_month', $month)
                    ->where('t_year', $year) 
                    ->where('depo_id', $depot_id);   

    }

    public function ffis($month,$year,$depot_id)
    
    {
        return $this->hasMany(DataFfisPaymentModel::class, 'distributor_id', 'distributor_id')
                    ->where('ffis_month', $month)
                    ->where('ffis_year', $year) 
                    ->where('depo_id', $depot_id);   

    }
    

    



  
    
}