<?php

namespace App\Http\Controllers\Orangtua;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Siswa;

class MapelController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('orangtua_id', auth()->user()->id)->first();
        $mapels = Mapel::where('kelas', $siswa->kelas_id)->get();

        return view('orangtua.mapel.index', compact('mapels'));
    }
}