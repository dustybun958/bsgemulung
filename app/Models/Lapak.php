<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapak extends Model
{
    use HasFactory;

    protected $table = 'lapak';

    protected $primaryKey = 'id_lapak';

    public $incrementing = false; // Karena id_lapak tidak auto-increment
    public $timestamps = false; // Menonaktifkan fitur timestamps
    protected $keyType = 'int'; // Pastikan tipe primary key sesuai dengan tipe data di database

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
        'status_lapak',
    ];

    // Relasi ke model Pasar
    public function pasar()
    {
        return $this->belongsTo(Pasar::class, 'id_pasar', 'id_pasar');
    }
}
