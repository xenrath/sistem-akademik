<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Orangtua;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $kelass = Kelas::get();
        $jumlah = 20;

        foreach ($kelass as $kelas) {
            for ($i = 0; $i < $jumlah; $i++) {
                $orangtua_gen = $faker->randomElement(['male', 'female']);
                $orangtua_nama = $this->nama($faker->name($orangtua_gen));
                $orangtua_nik = $faker->nik();
                $orangtua_gender = $orangtua_gen == 'male' ? 'L' : 'P';
                $orangtua_telp = $this->telp();
                
                $alamat = 'Tegal';

                $siswa_gen = $faker->randomElement(['male', 'female']);
                $siswa_nama = $this->nama($faker->name($siswa_gen));
                $siswa_nis = $this->nis($kelas->kelas);
                $siswa_gender = $siswa_gen == 'male' ? 'L' : 'P';
                $kelas_id = $kelas->id;

                $user = User::create([
                    'username' => $siswa_nis,
                    'password' => bcrypt($siswa_nis),
                    'nama' => $orangtua_nama,
                    'level' => 'orangtua',
                ]);

                Orangtua::create([
                    'user_id' => $user->id,
                    'nik' => $orangtua_nik,
                    'gender' => $orangtua_gender,
                    'telp' => $orangtua_telp,
                    'alamat' => $alamat
                ]);

                Siswa::create([
                    'nama' => $siswa_nama,
                    'nis' => $siswa_nis,
                    'gender' => $siswa_gender,
                    'alamat' => $alamat,
                    'kelas_id' => $kelas_id,
                    'orangtua_id' => $user->id
                ]);
            }
        }
    }

    public function nama($value)
    {
        $nama_array = explode(' ', $value);
        $nama = $nama_array[0] . ' ' . $nama_array[1];

        return $nama;
    }

    function telp()
    {
        $nomor = '1234567890';
        $telp  = '8' . substr(str_shuffle($nomor), 0, 10);
        return $telp;
    }

    public function nis($kelas)
    {
        $tahun = Carbon::now()->subYears($kelas - 1)->format('Y');

        $siswas = Siswa::whereHas('kelas', function ($query) use ($kelas) {
            $query->where('kelas', $kelas);
        })->get();

        if (count($siswas) > 0) {
            $jumlah = count($siswas) + 1;
            $urutan = sprintf("%03s", $jumlah);
        } else {
            $urutan = "001";
        }

        $nis = $tahun . $urutan;

        return $nis;
    }
}
