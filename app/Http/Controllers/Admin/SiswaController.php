<?php

namespace App\Http\Controllers\Admin;

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
        $siswas = Siswa::get();
        return view('admin/siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelass = Kelas::all();
        $gurus = User::where(['level' => 'guru'])->get();
        return view('admin/siswa.create', compact('gurus', 'kelass'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'nis' => 'required',
                'gender' => 'required',
                'alamat' => 'required',
                'kelas_id' => 'required',
                'guru_id' => 'required',
            ],
            [
                'nama.required' => 'Masukkan Nama',
                'nis.required' => 'Masukkan NIS',
                'gender.required' => 'Masukkan Gender',
                'alamat.required' => 'Masukkan Alamat',
                'kelas_id.required' => 'Pilih Kelas',
                'guru_id.required' => 'Pilih wali murid',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Siswa::create($request->all());

        return redirect('admin/siswa')->with('success', 'Berhasil menambahkan siswa');
    }

    public function show(Siswa $siswa)
    {
        $guru = User::where(['level' => 'guru'])->get();
        $kelas = Kelas::all();
        return view('admin/siswa.show', compact('siswa', 'guru', 'kelas'));
    }

    public function edit($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $guru = User::where(['level' => 'guru'])->get();
        $kelass = Kelas::all();
        return view('admin/siswa.update', compact('siswa', 'guru', 'kelass'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'nis' => 'required',
                'gender' => 'required',
                'alamat' => 'required',
                'kelas_id' => 'required',
                'guru_id' => 'required',
            ],
            [
                'nama.required' => 'Masukkan Nama',
                'nis.required' => 'Masukkan NIS',
                'gender.required' => 'Masukkan Gender',
                'alamat.required' => 'Masukkan Alamat',
                'kelas_id.required' => 'Pilih Kelas',
                'guru_id.required' => 'Pilih wali murid',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all();

            return back()->withInput()->with('error', $error);
        }

        Siswa::where('id', $id)->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
            'guru_id' => $request->guru_id
        ]);
        return redirect('admin/siswa')->with('success', 'Berhasil memperbarui siswa');
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect('admin/siswa')->with('success', 'Berhasil menghapus siswa');
    }
}