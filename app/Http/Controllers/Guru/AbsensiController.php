<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\DetailAbsensi;
use App\Models\Kelas;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $kelas = Kelas::where('guru_id', auth()->user()->id)->first();
        $siswas = Siswa::where('kelas_id', $kelas->id)->get();
        $absensi = Absensi::where([
            ['kelas_id', $kelas->id],
            ['tanggal', Carbon::now()->format('Y-m-d')]
        ])->first();

        return view('guru.absensi.index', compact('kelas', 'siswas', 'absensi'));
    }

    function store(Request $request)
    {
        $kelas = Kelas::where('guru_id', auth()->user()->id)->first();
        $siswas = Siswa::where('kelas_id', $kelas->id)->get();

        $datas = array();

        if ($request->checkbox) {
            foreach ($siswas as $siswa) {
                $array['siswa_id'] = $siswa->id;
                if (in_array($siswa->id, $request->checkbox)) {
                    $array['absensi'] = true;
                } else {
                    $array['absensi'] = false;
                }
                array_push($datas, $array);
            }
        } else {
            return back()->with('error', 'Harap pilih siswa terlebih dahulu!');
        }

        $absensi = Absensi::create([
            'kelas_id' => $request->kelas_id,
            'tanggal' => Carbon::now()->format('Y-m-d')
        ]);

        foreach ($datas as $data) {
            DetailAbsensi::create([
                'absensi_id' => $absensi->id,
                'siswa_id' => $data['siswa_id'],
                'absensi' => $data['absensi']
            ]);
        }

        return back()->with('success', 'Berhasil melakukan Absensi');
    }

    public function list()
    {
        $kelas = Kelas::where('guru_id', auth()->user()->id)->first();
        $absensis = Absensi::where('kelas_id', $kelas->id)->get();

        return view('guru.absensi.list', compact('absensis'));
    }

    public function list_show($id)
    {
        $kelas = Kelas::where('guru_id', auth()->user()->id)->first();
        $absensi = Absensi::where('id', $id)->first();
        $detail_absensis = DetailAbsensi::where('absensi_id', $id)->with('siswa')->get();

        return view('guru.absensi.show', compact('kelas', 'absensi', 'detail_absensis'));
    }

    // id detail absensi
    public function update(Request $request, $id)
    {
        DetailAbsensi::where('id', $id)->update([
            'absensi' => $request->absensi
        ]);

        return back();
    }
}
