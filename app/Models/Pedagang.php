<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedagang extends Model
{
    use HasFactory;

    protected $table = 'pedagang';
    protected $primaryKey = 'id_pedagang';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_pedagang',
        'id_lapak',
        'nik',
        'check_in',
        'check_out',
        'status',
        'VA',
        'id_penarik_retribusi',
        'izin'
    ];

    // Relasi many-to-one dengan lapak
    public function lapak()
    {
        return $this->belongsTo(Lapak::class, 'id_lapak', 'id_lapak');
    }

    // Relasi many-to-one dengan data_diri
    public function dataDiri()
    {
        return $this->belongsTo(DataDiri::class, 'nik', 'nik');
    }

    // Relasi many-to-one dengan penarik_retribusi
    public function penarikRetribusi()
    {
        return $this->belongsTo(PenarikRetribusi::class, 'id_penarik_retribusi', 'id_penarik_retribusi');
    }
}
