<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil_belajar extends Model
{
    use HasFactory;
    protected $fillable = [
        'mapel_id',
        'soal_id',
        'guru_id',
        'kelas_id',
        'siswa_id',
        'nilai'
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, "mapel_id", "id");
    }

    public function soal()
    {
        return $this->belongsTo(Soal::class, "soal_id", "id");
    }

    public function guru()
    {
        return $this->belongsTo(User::class, "guru_id", "id");
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, "kelas_id", "id");
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, "siswa_id", "id");
    }
}