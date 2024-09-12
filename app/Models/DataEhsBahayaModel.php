<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataEhsBahayaModel extends Model
{
    use HasFactory;
    protected $table = 'data_ehs_bahaya';
    protected $primaryKey = 'eb_id';
    protected $fillable = [
        'eb_id',
        'ec_id',
        'ea_id',
        'eb_type',
        'eb_bahaya',
        'eb_dampak_karyawan',
        'eb_dampak_timbulkan',
        'eb_legal',
        'eb_kontrol',
        'eb_action',
        'eb_konsekuensi',
        'eb_probabilitas',
        'eb_nilai_bahaya',
    ];

    public $timestamps = false;

    public function aktivitas()
    {
        return $this->belongsTo(DataEhsAktivitasModel::class, 'ea_id', 'ea_id');
    }
}