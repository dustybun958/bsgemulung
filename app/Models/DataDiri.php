<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    use HasFactory;
    protected $table = 'data_diri';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'kode_alamat',
        'rt',
        'rw'
    ];

    // Relasi many-to-one dengan alamat
    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'kode_alamat', 'kode_alamat');
    }

    // Relasi one-to-many dengan pedagang
    public function pedagang()
    {
        return $this->hasMany(Pedagang::class, 'nik', 'nik');
    }
}
