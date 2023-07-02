<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSekolah extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_judul',
        'home_deskripsi',
        'home_gambar',
        'about_deskripsi',
        'about_visi',
        'about_misi',
        'galeri_gambar',
        'ppdb_flayer',
        'kontak_alamat',
        'kontak_email',
        'kontak_telp',
        'kontak_latitude',
        'kontak_longitude',
        'link_facebook',
        'link_instagram',
    ];

    protected $casts = [
        'galeri_gambar' => 'array'
    ];
}
