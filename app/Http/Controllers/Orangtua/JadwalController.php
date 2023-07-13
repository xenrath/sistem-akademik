<?php

namespace App\Http\Controllers\Orangtua;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('orangtua_id', auth()->user()->id)->first();
        $kelas = Kelas::where('id', $siswa->id)->first();
        
        return view('orangtua.jadwal.index', compact('kelas'));
    }
}
