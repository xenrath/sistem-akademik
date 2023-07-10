<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kelas',
    ];

    public function hasil()
    {
        return $this->hasMany(Hasil_belajar::class);
    }

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }
}
