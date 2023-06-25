<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswa = [
            [
                'nama' => 'januaryo',
                'nis' => '1098978',
                'gender' => 'L',
                'alamat' => 'Tegal',
                'kelas_id' => '1',
                'guru_id' => '2'
            ],
            [
                'nama' => 'rendy',
                'nis' => '1098973',
                'gender' => 'L',
                'alamat' => 'Tegal',
                'kelas_id' => '1',
                'guru_id' => '2'
            ],
            [
                'nama' => 'saputro',
                'nis' => '1098972',
                'gender' => 'L',
                'alamat' => 'Tegal',
                'kelas_id' => '1',
                'guru_id' => '2'
            ],
        ];

        Siswa::insert($siswa);
    }
}