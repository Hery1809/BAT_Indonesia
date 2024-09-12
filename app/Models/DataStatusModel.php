<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataStatusModel extends Model
{
    use HasFactory;

    protected $table = 'data_status';
    protected $primaryKey = 'status_id';
    public $timestamps = false;

    protected $fillable = ['status_id', 'status_name'];
}
