<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = [
            [
                'kelas' => '1',
                'ruangan' => '01',
            ],
            [
                'kelas' => '2',
                'ruangan' => '02',
            ],
            [
                'kelas' => '3',
                'ruangan' => '03',
            ],

            [
                'kelas' => '4',
                'ruangan' => '04',
            ],

            [
                'kelas' => '5',
                'ruangan' => '05',
            ],

            [
                'kelas' => '6',
                'ruangan' => '06',
            ],
        ];

        Kelas::insert($kelas);
    }
}