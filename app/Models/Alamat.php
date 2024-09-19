<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $table = 'alamat';
    protected $primaryKey = 'kode_alamat';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'kode_alamat',
        'kab_kota',
        'kecamatan',
        'Kelurahan'

    ];

    // Relasi one-to-many dengan data_diri
    public function dataDiri()
    {
        return $this->hasMany(DataDiri::class, 'kode_alamat', 'kode_alamat');
    }
}
