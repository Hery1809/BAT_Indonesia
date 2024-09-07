<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCigaretteModel extends Model
{
    use HasFactory;
    protected $table = 'data_cigarette';
    protected $primaryKey = 'cigarette_id';
    protected $fillable = [
        'cigarette_id',
        'cigarette_name',
        'cigarette_value',
        'cigarette_bonus',
        'created_date',
        'created_by',
    ];

    public $timestamps = false;
}
