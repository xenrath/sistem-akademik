<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nis',
        'gender',
        'alamat',
        'kelas_id',
        'orangtua_id'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function orangtua()
    {
        return $this->belongsTo(User::class);
    }

    public function nilai()
    {
        return $this->belongsTo(Nilai::class);
    }

    public function hasil()
    {
        return $this->hasMany(Hasil_belajar::class);
    }
}