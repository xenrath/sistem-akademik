<?php

namespace App\Http\Controllers\Orangtua;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('orangtua_id', auth()->user()->id)->first();
        $mapels = Mapel::where('kelas', $siswa->kelas_id)->get();

        return view('orangtua.nilai.index', compact('siswa', 'mapels'));
    }
}
