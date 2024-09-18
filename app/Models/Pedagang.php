<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedagang extends Model
{
    use HasFactory;

    protected $table = 'pedagang';
    protected $primaryKey = 'id_pedagang';
    public $incrementing = false; // Karena `id_pedagang` bukan auto-increment
    protected $keyType = 'string'; // Tipe data primary key adalah string

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

    public $timestamps = false; // Tidak menggunakan timestamps by default

    // Relasi ke model Lapak
    public function lapak()
    {
        return $this->belongsTo(Lapak::class, 'id_lapak', 'id_lapak');
    }

    // Relasi ke model DataDiri
    public function dataDiri()
    {
        return $this->belongsTo(DataDiri::class, 'nik', 'nik');
    }

    // Relasi ke model PenarikRetribusi
    public function penarikRetribusi()
    {
        return $this->belongsTo(PenarikRetribusi::class, 'id_penarik_retribusi', 'id_penarik_retribusi');
    }
}
