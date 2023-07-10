<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Bahasa Indonesia',
            'Matematika',
            'Ilmu Pengetahuan Alam',
            'Ilmu Pengetahuan Sosial',
            'Pendidikan Agama',
            'Bahasa Inggris'
        ];

        $mapels = [];

        for ($kelas = 1; $kelas <= 6; $kelas++) {
            for ($i = 0; $i < count($data); $i++) {
                Mapel::create([
                    'nama' => $data[$i] . ' ' . $kelas,
                    'kelas' => $kelas
                ]);
            }
        }
    }
}
