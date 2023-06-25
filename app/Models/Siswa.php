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
        'guru_id'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, "kelas_id", "id");
    }

    public function guru()
    {
        return $this->belongsTo(User::class, "guru_id", "id");
    }
}