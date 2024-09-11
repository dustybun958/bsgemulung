<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapak extends Model
{
    use HasFactory;

    protected $table = 'lapak';
    protected $primaryKey = 'id_lapak';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'id_lapak',
        'id_pasar',
        'jenis',
        'lantai',
        'blok',
        'zonasi',
        'no',
        'hadap',
        'luas',
        'tarif_dasar',
        'status_lapak'
    ];

    // Relasi many-to-one dengan pasar
    public function pasar()
    {
        return $this->belongsTo(Pasar::class, 'id_pasar', 'id_pasar');
    }

    // Relasi one-to-many dengan pedagang
    public function pedagang()
    {
        return $this->hasMany(Pedagang::class, 'id_lapak', 'id_lapak');
    }
}
