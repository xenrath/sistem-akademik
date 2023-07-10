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
                'nama' => '1',
                'kelas' => '1',
            ],
            [
                'nama' => '2',
                'kelas' => '2',
            ],
            [
                'nama' => '3',
                'kelas' => '3',
            ],
            [
                'nama' => '4',
                'kelas' => '4',
            ],
            [
                'nama' => '5',
                'kelas' => '5',
            ],
            [
                'nama' => '6',
                'kelas' => '6',
            ],
        ];

        for ($i = 0; $i < count($kelas); $i++) {
            $kelas[$i]['guru_id'] = $gurus[$i]->id;
        }

        Kelas::insert($kelas);
    }
}
