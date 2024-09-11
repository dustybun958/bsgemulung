<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenarikRetribusi extends Model
{
    use HasFactory;
    protected $table = 'penarik_retribusi';
    protected $primaryKey = 'id_penarik_retribusi';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'id_penarik_retribusi',
        'nama'
    ];

    // Relasi one-to-many dengan pedagang
    public function pedagang()
    {
        return $this->hasMany(Pedagang::class, 'id_penarik_retribusi', 'id_penarik_retribusi');
    }
}
