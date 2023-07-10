<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Orangtua;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrangtuaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $siswas = Siswa::get();
        foreach ($siswas as $siswa) {
            $gen = $faker->randomElement(['male', 'female']);

            $nama = $this->nama($faker->name($gen));
            $nik = $this->nik();
            $gender = $gen == 'male' ? 'L' : 'P';
            $telp = $this->telp();
            $alamat = 'Tegal';

            $user = User::create([
                'username' => $siswa->nis,
                'password' => bcrypt($siswa->nis),
                'nama' => $nama,
                'level' => 'guru',
            ]);

            Orangtua::create([
                'user_id' => $user->id,
                'nik' => $nik,
                'gender' => $gender,
                'telp' => $telp,
                'alamat' => $alamat
            ]);
        }
    }
}
