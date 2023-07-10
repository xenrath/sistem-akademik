<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = User::where('level', 'guru')->get();

        return view('admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nuptk' => 'required',
            'gender' => 'required',
            'telp' => 'required|unique:gurus',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'nama.required' => 'Nama Guru harus diisi!',
            'nuptk.required' => 'NUPTK harus diisi!',
            'gender.required' => 'Jenis kelamin harus dipilih!',
            'telp.required' => 'Nomor telepon harus diisi!',
            'telp.unique' => 'Nomor telepon sudah digunakan!',
            'alamat.required' => 'Alamat harus diisi!',
            'foto.required' => 'Foto harus dipilih!',
            'foto.image' => 'Foto harus berformat jpeg, jpg, png!',
            'foto.mimes' => 'Foto harus berformat jpeg, jpg, png!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
        $namafoto = "guru/" . date('YmdHis') . "." . $foto;
        $request->foto->storeAs('public/uploads', $namafoto);

        $user = User::create([
            'username' => $request->nuptk,
            'password' => bcrypt($request->nuptk),
            'nama' => $request->nama,
            'level' => 'guru'
        ]);

        Guru::create([
            'user_id' => $user->id,
            'nuptk' => $request->nuptk,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'foto' => $namafoto
        ]);

        return redirect('admin/guru')->with('success', 'Berhasil menambahkan Guru');
    }

    public function show($id)
    {
        $guru = User::where('id', $id)->first();

        return view('admin.guru.show', compact('guru'));
    }

    public function edit($id)
    {
        $guru = User::where('id', $id)->first();

        return view('admin.guru.update', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::where('user_id', $id)->first();

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nuptk' => 'required',
            'gender' => 'required',
            'telp' => 'required|unique:gurus,telp,' . $guru->id,
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama Guru harus diisi!',
            'nuptk.required' => 'NUPTK harus diisi!',
            'gender.required' => 'Jenis kelamin harus dipilih!',
            'telp.required' => 'Nomor telepon harus diisi!',
            'telp.unique' => 'Nomor telepon sudah digunakan!',
            'alamat.required' => 'Alamat harus diisi!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        $user = User::where('id', $id)->first();

        if ($request->foto) {
            $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
            $namafoto = "guru/" . date('YmdHis') . "." . $foto;
            $request->foto->storeAs('public/uploads', $namafoto);
        } else {
            $namafoto = $user->guru->foto;
        }

        User::where('id', $id)->update([
            'nama' => $request->nama,
        ]);

        Guru::where('user_id', $id)->update([
            'nuptk' => $request->nuptk,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'foto' => $namafoto
        ]);

        return redirect('admin/guru')->with('success', 'Berhasil memperbarui Guru');
    }

    public function destroy($id)
    {
        $guru = User::find($id);
        $guru->guru()->delete();
        $guru->delete();

        return redirect('admin/guru')->with('success', 'Berhasil menghapus Guru');
    }
}
