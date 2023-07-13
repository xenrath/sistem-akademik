<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    public function index()
    {
        $kelass = Kelas::get();

        return view('admin.jadwal.index', compact('kelass'));
    }

    // id kelas
    public function show($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        $jadwal = Jadwal::where('kelas_id', $id)->get();
        $mapels = Mapel::where('kelas', $kelas->kelas)->get();

        return view('admin.jadwal.show', compact('jadwal', 'mapels', 'kelas'));
    }

    public function store(Request $request)
    {
        Jadwal::create([
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
            'hari' => $request->hari,
            'jam_awal' => $request->jam_awal,
            'jam_akhir' => $request->jam_akhir
        ]);

        return back();
    }
}
