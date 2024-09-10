<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataEhsAktivitasModel extends Model
{
    use HasFactory;
    protected $table = 'data_ehs_aktivitas';
    protected $primaryKey = 'ea_id';
    public $incrementing = true;
    protected $fillable = [
        'ea_id',
        'ec_id',
        'ea_name',
    ];

    public $timestamps = false;
}