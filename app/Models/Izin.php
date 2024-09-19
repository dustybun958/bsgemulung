<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;
    protected $table = 'izin';
    protected $primaryKey = 'id_izin';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'id_izin',
        'id_pedagang',
        'izin',
    ];

    // Relasi one-to-many dengan pedagang
    public function pedagang()
    {
        return $this->hasMany(Pedagang::class, 'id_pedagang', 'id_pedagang');
    }
}
