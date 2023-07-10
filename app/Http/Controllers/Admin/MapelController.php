<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::get();

        return view('admin.mapel.index', compact('mapels'));
    }

    public function create()
    {
        return view('admin.mapel.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kelas' => 'required'
        ], [
            'nama.required' => 'Nama Mapel harus diisi!',
            'kelas.required' => 'Kelas harus dipilih!'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Mapel::create($request->all());

        return redirect('admin/mapel')->with('success', 'Berhasil menambahkan Mapel');
    }

    public function edit($id)
    {
        $mapel = Mapel::where('id', $id)->first();

        return view('admin.mapel.update', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kelas' => 'required'
        ], [
            'nama.required' => 'Nama Mapel harus diisi!',
            'kelas.required' => 'Kelas harus dipilih!'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Mapel::where('id', $id)->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas
        ]);

        return redirect('admin/mapel')->with('success', 'Berhasil memperbarui Mapel');
    }

    public function destroy($id)
    {
        $mapel = Mapel::find($id);
        $mapel->delete();

        return redirect('admin/mapel')->with('success', 'Berhasil menghapus Mapel');
    }
}
