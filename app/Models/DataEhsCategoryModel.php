<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataEhsCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'data_ehs_category';
    protected $primaryKey = 'ec_id';
    protected $fillable = [
        'ec_id',
        'ec_name',
    ];
}