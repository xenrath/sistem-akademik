<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kelas_id',
        'guru_id'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function guru()
    {
        return $this->belongsTo(User::class);
    }

    public function hasil()
    {
        return $this->hasMany(Hasil_belajar::class);
    }

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }
}
