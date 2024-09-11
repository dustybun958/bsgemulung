<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasar extends Model
{
    use HasFactory;

    protected $table = 'pasar';
    protected $primaryKey = 'id_pasar';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'id_pasar',
        'pasar',
        'koordinat',
        'kantor_pengelola',
        'toilet',
        'pos_ukur_ulang',
        'pos_keamanan',
        'ruang_menyusui',
        'ruang_kesehatan',
        'ruang_peribadatan',
        'pemadam_kebakaran',
        'tempat_parkir',
        'tps',
        'pengolahan_air_limbah',
        'air_bersih',
        'listrik'
    ];

    // Relasi one-to-many dengan lapak
    public function lapak()
    {
        return $this->hasMany(Lapak::class, 'id_pasar', 'id_pasar');
    }
}
