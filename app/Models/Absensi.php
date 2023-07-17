<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas_id',
        'tanggal'
    ];

    public function kelas()
    {
        $this->belongsTo(Kelas::class);
    }
}
