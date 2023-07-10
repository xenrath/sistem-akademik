<?php

namespace App\Http\Controllers\Guru;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $kelas = Kelas::where('guru_id', auth()->user()->id)->first();
        $siswas = Siswa::where('kelas_id', $kelas->id)->get();

        return view('guru.siswa.index', compact('siswas'));
    }

    public function show($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $guru = User::where('level', 'guru')->get();
        $kelas = Kelas::all();
        return view('guru.siswa.show', compact('siswa', 'guru', 'kelas'));
    }
}