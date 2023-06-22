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
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'nuptk' => '-',
                'telp' => '-',
                'alamat' => '-',
                'password' => bcrypt('admin'),
                'level' => 'admin'
            ],
            [
                'name' => 'Tuti Handayani',
                'email' => 'guru@gmail.com',
                'nuptk' => '1209748',
                'telp' => '81902624982',
                'alamat' => 'Tegal',
                'password' => bcrypt('guru'),
                'level' => 'guru'
            ],
            [
                'name' => 'Nur halizah',
                'email' => 'guru1@gmail.com',
                'nuptk' => '1209749',
                'telp' => '81902624191',
                'alamat' => 'Tegal',
                'password' => bcrypt('guru1'),
                'level' => 'guru'
            ],

            [
                'name' => 'Rindiyani',
                'email' => 'guru2@gmail.com',
                'nuptk' => '1209749',
                'telp' => '81902624971',
                'alamat' => 'Tegal',
                'password' => bcrypt('guru2'),
                'level' => 'guru'
            ]
        ];

        User::insert($users);
    }
}