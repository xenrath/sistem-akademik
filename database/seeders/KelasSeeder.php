<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gurus = User::where('level', 'guru')->get();

        $kelas = [
            [
                'nama' => '1A',
                'kelas' => '1',
            ],
            [
                'nama' => '1B',
                'kelas' => '1',
            ],
            [
                'nama' => '2A',
                'kelas' => '2',
            ],
            [
                'nama' => '2B',
                'kelas' => '2',
            ],
            [
                'nama' => '3A',
                'kelas' => '3',
            ],
            [
                'nama' => '3B',
                'kelas' => '3',
            ],
            [
                'nama' => '4A',
                'kelas' => '4',
            ],
            [
                'nama' => '4B',
                'kelas' => '4',
            ],
            [
                'nama' => '5A',
                'kelas' => '5',
            ],
            [
                'nama' => '5B',
                'kelas' => '5',
            ],
            [
                'nama' => '6A',
                'kelas' => '6',
            ],
            [
                'nama' => '6B',
                'kelas' => '6',
            ],
        ];

        for ($i = 0; $i < count($kelas); $i++) {
            $kelas[$i]['guru_id'] = $gurus[$i]->id;
        }

        Kelas::insert($kelas);
    }
}
