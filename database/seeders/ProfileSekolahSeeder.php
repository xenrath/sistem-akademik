<?php

namespace Database\Seeders;

use App\Models\ProfileSekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profilesekolah = [
            'home_judul' => 'Selamat Datang di Sekolah Dasar ABC',
            'home_deskripsi' => 'Pendidikan Berkualitas untuk Masa Depan Anak Anda',
            'home_gambar' => 'logo.png',
            'about_deskripsi' => 'Sekolah Dasar ABC adalah lembaga pendidikan yang memberikan pendidikan berkualitas dengan pendekatan inovatif. Kami fokus pada pengembangan karakter siswa dan menjaga kerjasama erat dengan orang tua. Keamanan siswa menjadi prioritas utama kami. Bergabunglah dengan kami di Sekolah Dasar ABC untuk pengalaman belajar terbaik.',
            'about_visi' => 'Memberikan pendidikan berkualitas untuk mengembangkan potensi siswa secara holistik dan siap menghadapi masa depan.',
            'about_misi' => 'Mengembangkan potensi siswa melalui pendekatan inovatif, membangun lingkungan belajar inklusif, menjalin kemitraan dengan orang tua, menjaga keamanan siswa, dan mendorong nilai-nilai etika dan integritas.',
            'galeri_gambar' => null,
            'ppdb_flayer' => null,
            'kontak_alamat' => 'Jalan Raya II Adiwerna, Desa Kalimati, Kecamatan Adiwerna, Kabupaten Tegal',
            'kontak_email' => 'admin@sdnabc.com',
            'kontak_telp' => '123456789012',
            'kontak_latitude' => '-6.880453700173988',
            'kontak_longitude' => '109.11397673964508',
            'link_facebook' => '',
            'link_instagram' => '',
        ];

        ProfileSekolah::create($profilesekolah);
    }
}
