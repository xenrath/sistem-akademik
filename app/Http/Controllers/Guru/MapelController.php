<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mapel;

class MapelController extends Controller
{
    public function index()
    {
        $kelas = Kelas::where('guru_id', auth()->user()->id)->first();
        $mapels = Mapel::where('kelas', $kelas->kelas)->get();

        return view('guru.mapel.index', compact('mapels'));
    }
}