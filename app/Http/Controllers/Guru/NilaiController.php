<?php

namespace App\Http\Controllers\Guru;

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
        $kelas = Kelas::where('guru_id', auth()->user()->id)->first();
        $mapels = Mapel::where('kelas', $kelas->kelas)->get();

        return view('guru.nilai.index', compact('mapels'));
    }

    // id mapel
    public function show($id)
    {
        $kelas = Kelas::where('guru_id', auth()->user()->id)->first();
        $siswas = Siswa::where('kelas_id', $kelas->id)->get();
        $nilais = Nilai::where('mapel_id', $id)->get();
        $mapel = Mapel::where('id', $id)->first();

        return view('guru.nilai.show', compact('siswas', 'nilais', 'mapel'));
    }

    public function absensi(Request $request, $id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $nilai = Nilai::where([
            ['mapel_id', $request->mapel_id],
            ['kelas_id', $siswa->kelas_id],
            ['siswa_id', $id],
        ])->first();

        if ($nilai) {
            Nilai::where('id', $nilai->id)->update([
                'absensi' => $request->absensi,
            ]);
        } else {
            Nilai::create([
                'mapel_id' => $request->mapel_id,
                'kelas_id' => $siswa->kelas_id,
                'siswa_id' => $id,
                'absensi' => $request->absensi
            ]);
        }

        return back()->with('success', 'Berhasil memperbarui nilai absensi ' . $siswa->nama);
    }

    public function tugas(Request $request, $id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $nilai = Nilai::where([
            ['mapel_id', $request->mapel_id],
            ['kelas_id', $siswa->kelas_id],
            ['siswa_id', $id],
        ])->first();

        if ($nilai) {
            Nilai::where('id', $nilai->id)->update([
                'tugas' => $request->tugas,
            ]);
        } else {
            Nilai::create([
                'mapel_id' => $request->mapel_id,
                'kelas_id' => $siswa->kelas_id,
                'siswa_id' => $id,
                'tugas' => $request->tugas
            ]);
        }

        return back()->with('success', 'Berhasil memperbarui nilai tugas ' . $siswa->nama);
    }

    public function uts(Request $request, $id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $nilai = Nilai::where([
            ['mapel_id', $request->mapel_id],
            ['kelas_id', $siswa->kelas_id],
            ['siswa_id', $id],
        ])->first();

        if ($nilai) {
            Nilai::where('id', $nilai->id)->update([
                'uts' => $request->uts,
            ]);
        } else {
            Nilai::create([
                'mapel_id' => $request->mapel_id,
                'kelas_id' => $siswa->kelas_id,
                'siswa_id' => $id,
                'uts' => $request->uts
            ]);
        }

        return back()->with('success', 'Berhasil memperbarui nilai UTS ' . $siswa->nama);
    }

    public function uas(Request $request, $id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $nilai = Nilai::where([
            ['mapel_id', $request->mapel_id],
            ['kelas_id', $siswa->kelas_id],
            ['siswa_id', $id],
        ])->first();

        if ($nilai) {
            Nilai::where('id', $nilai->id)->update([
                'uas' => $request->uas,
            ]);
        } else {
            Nilai::create([
                'mapel_id' => $request->mapel_id,
                'kelas_id' => $siswa->kelas_id,
                'siswa_id' => $id,
                'uas' => $request->uas
            ]);
        }

        return back()->with('success', 'Berhasil memperbarui nilai UAS  ' . $siswa->nama);
    }
}
