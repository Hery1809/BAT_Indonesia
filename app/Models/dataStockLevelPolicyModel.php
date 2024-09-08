<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataStockLevelPolicyModel extends Model
{
    use HasFactory;
    protected $table = 'data_stock_level_policy';
    protected $primaryKey = 'slp_id';
    protected $fillable = [
        'slp_id',
        'slp_policy',
    ];

    public $timestamps = false;
}
