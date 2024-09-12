<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPositionModel extends Model
{
    use HasFactory;
    protected $table = 'data_position';
    protected $primaryKey = 'position_id';
    protected $fillable = [
        'position_id',
        'position_name',
    ];
}
