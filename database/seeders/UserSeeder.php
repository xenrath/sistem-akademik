<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'nama' => 'Admin',
            'level' => 'admin'
        ]);
    }
}
