<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'mapel_id',
        'kelas_id',
        'siswa_id',
        'absensi',
        'tugas',
        'uts',
        'uas'
    ];
}
