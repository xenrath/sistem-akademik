<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $jumlah = 12;
        for ($i = 0; $i < $jumlah; $i++) {
            $gen = $faker->randomElement(['male', 'female']);

            $nama = $this->nama($faker->name($gen)) . ', S.Pd.';
            $nuptk = $this->nuptk();
            $gender = $gen == 'male' ? 'L' : 'P';
            $telp = $this->telp();
            $alamat = 'Tegal';
            $foto = $gen == 'male' ? 'guru/guru-l.jpg' : 'guru/guru-p.jpg';


            $user = User::create([
                'username' => $nuptk,
                'password' => bcrypt($nuptk),
                'nama' => $nama,
                'level' => 'guru',
            ]);

            Guru::create([
                'user_id' => $user->id,
                'nuptk' => $nuptk,
                'gender' => $gender,
                'telp' => $telp,
                'alamat' => $alamat,
                'foto' => $foto
            ]);
        }
    }

    public function nama($value)
    {
        $nama_array = explode(' ', $value);
        $nama = $nama_array[0] . ' ' . $nama_array[1];

        return $nama;
    }

    public function nuptk()
    {
        $nomor = '1234567890';
        $nuptk  = substr(str_shuffle($nomor), 0, 16);
        return $nuptk;
    }

    function telp()
    {
        $nomor = '1234567890';
        $telp  = '8' . substr(str_shuffle($nomor), 0, 10);
        return $telp;
    }
}
