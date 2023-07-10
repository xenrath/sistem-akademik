<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Faker\Factory as Faker;

class KelasController extends Controller
{
    public function index()
    {
        $kelass = Kelas::get();

        return view('admin.kelas.index', compact('kelass'));
    }

    public function create()
    {
        $gurus = User::where('level', 'guru')->get();

        return view('admin.kelas.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kelas' => 'required',
            'guru_id' => 'required',
        ], [
            'nama.required' => 'Nama kelas harus diisi!',
            'kelas.required' => 'Kelas harus dipilih!',
            'guru_id.required' => 'Wali kelas harus dipilih!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Kelas::create($request->all());

        return redirect('admin/kelas')->with('success', 'Berhasil menambahkan Kelas');
    }

    public function edit($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        $gurus = User::where('level', 'guru')->get();

        return view('admin.kelas.update', compact('kelas', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kelas' => 'required',
            'guru_id' => 'required',
        ], [
            'nama.required' => 'Nama kelas harus diisi!',
            'kelas.required' => 'Kelas harus dipilih!',
            'guru_id.required' => 'Wali kelas harus dipilih!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Kelas::where('id', $id)->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'guru_id' => $request->guru_id,
        ]);

        return redirect('admin/kelas')->with('success', 'Berhasil memperbarui Kelas');
    }

    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();

        return redirect('admin/kelas')->with('success', 'Berhasil menghapus Kelas');
    }
}
