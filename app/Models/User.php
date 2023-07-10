<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'password',
        'nama',
        'level'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    public function orangtua()
    {
        return $this->hasOne(Orangtua::class);
    }

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'orangtua_id', 'id');
    }

    public function hasil()
    {
        return $this->hasMany(Hasil_belajar::class);
    }

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function isAdmin()
    {
        if ($this->level == 'admin') {
            return true;
        }
        return false;
    }

    public function isGuru()
    {
        if ($this->level == 'guru') {
            return true;
        }
        return false;
    }
}
