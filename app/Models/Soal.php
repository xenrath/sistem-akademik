<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'mapel_id',
        'guru_id'
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function guru()
    {
        return $this->belongsTo(User::class);
    }

    public function hasil()
    {
        return $this->hasMany(Hasil_belajar::class);
    }
}