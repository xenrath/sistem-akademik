<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index()
    {
        $kelass = Kelas::get();
        return view('admin.kelas.index', compact('kelass'));
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'kelas' => 'required',
                'ruangan' => 'required'
            ],
            [
                'kelas.required' => 'Masukan kelas',
                'ruangan.required' => 'Masukan ruangan'
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Kelas::create($request->all());

        return redirect('admin.kelas.index')->with('success', 'Berhasil menambahkan kelas');
    }

    public function edit($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        return view('admin.kelas.update', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'kelas' => 'required',
                'ruangan' => 'required'
            ],
            [
                'kelas.required' => 'Masukan kelas',
                'ruangan.required' => 'Masukan ruangan'
            ]
        );


        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Kelas::where('id', $id)
            ->update([
                'kelas' => $request->kelas,
                'ruangan' => $request->ruangan,
            ]);

        return redirect('admin.kelas.index')->with('status', 'Berhasil memperbarui kelas');
    }

    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->siswa()->delete();
        $kelas->delete();

        return redirect('admin/kelas')->with('success', 'Berhasil menghapus kelas');
    }
}