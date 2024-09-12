<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMonthModel extends Model
{
    use HasFactory;
    protected $table = 'data_month';
    protected $fillable = [
        'month_int',
        'month_var',
        
    ];

    
}
