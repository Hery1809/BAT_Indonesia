<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWeekModel extends Model
{
    use HasFactory;
    protected $table = 'data_week';
    protected $primaryKey = 'week_int';
    protected $fillable = [
        'week_int',
        'week_var',
    ];

    public $timestamps = false;
}