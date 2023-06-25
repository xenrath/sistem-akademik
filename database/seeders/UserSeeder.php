<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'nama' => 'admin',
                'nuptk' => '-',
                'telp' => '-',
                'alamat' => '-',
                'level' => 'admin'
            ],
            [
                'username' => 'guru',
                'password' => bcrypt('guru'),
                'nama' => 'Tuti Handayani',
                'nuptk' => '1209748',
                'telp' => '81902624982',
                'alamat' => 'Tegal',
                'level' => 'guru'
            ],
            [
                'username' => 'guru1',
                'password' => bcrypt('guru1'),
                'nama' => 'Nur halizah',
                'nuptk' => '1209749',
                'telp' => '81902624191',
                'alamat' => 'Tegal',
                'level' => 'guru'
            ],

            [
                'username' => 'guru2',
                'password' => bcrypt('guru2'),
                'nama' => 'Rindiyani',
                'nuptk' => '1209749',
                'telp' => '81902624971',
                'alamat' => 'Tegal',
                'level' => 'guru'
            ]
        ];

        User::insert($users);
    }
}