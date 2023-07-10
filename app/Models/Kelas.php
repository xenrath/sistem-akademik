<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kelas',
        'guru_id'
    ];

    public function guru()
    {
        return $this->belongsTo(User::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function hasil()
    {
        return $this->hasMany(Hasil_belajar::class);
    }

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
}