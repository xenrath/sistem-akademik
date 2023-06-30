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
        $gurus = User::where(['level' => 'guru'])->get();
        $kelass = Kelas::get();
        return view('admin.mapel.create', compact('gurus', 'kelass'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'guru_id' => 'required',
                'kelas_id' => 'required'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong !',
                'guru_id.required' => 'Guru tidak boleh kosong !',
                'kelas_id.required' => 'Kelas tidak boleh kosong !'
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Mapel::create($request->all());
        return redirect('admin/mapel')->with('success', 'Berhasil menambahkan mapel');
    }

    public function edit($id)
    {
        $mapels = Mapel::where('id', $id)->first();
        $gurus = User::where(['level' => 'guru'])->get();
        $kelass = Kelas::all();
        return view('admin.mapel.update', compact('mapels', 'gurus', 'kelass'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'guru_id' => 'required',
                'kelas_id' => 'required'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong !',
                'guru_id.required' => 'Guru tidak boleh kosong !',
                'kelas_id.required' => 'Kelas tidak boleh kosong !'
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Mapel::where('id',$id)
            ->update([
                'nama' => $request->nama,
                'guru_id' => $request->guru_id,
                'kelas_id' => $request->kelas_id,
            ]);

        return redirect('admin/mapel')->with('success', 'Berhasil memperbarui mapel');
    }

    public function destroy()
    {
        $
    }
}