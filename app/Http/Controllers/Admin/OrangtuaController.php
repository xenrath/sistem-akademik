<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orangtua;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrangtuaController extends Controller
{
    public function index()
    {
        $orangtuas = User::where('level', 'orangtua')->get();

        return view('admin.orangtua.index', compact('orangtuas'));
    }

    public function show($id)
    {
        $orangtua = User::where('id', $id)->first();

        return view('admin.orangtua.show', compact('orangtua'));
    }

    public function edit($id)
    {
        $orangtua = User::where('id', $id)->first();

        return view('admin.orangtua.update', compact('orangtua'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required',
            'gender' => 'required',
            'telp' => 'required|unique:orangtuas,telp,' . $user->orangtua->id,
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama Orangtua harus diisi!',
            'nik.required' => 'NIK harus diisi!',
            'gender.required' => 'Jenis kelamin siswa harus dipilih!',
            'telp.required' => 'Nomor telepon harus diisi!',
            'telp.unique' => 'Nomor telepon sudah digunakan!',
            'alamat.required' => 'Alamat harus diisi!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        User::where('id', $id)->update([
            'nama' => $request->nama,
        ]);

        Orangtua::where('user_id', $id)->update([
            'nik' => $request->nik,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'alamat' => $request->alamat
        ]);

        return redirect('admin/orangtua')->with('success', 'Berhasil memperbarui Orangtua');
    }

    public function destroy($id)
    {
        $orangtua = User::find($id);
        $orangtua->siswas()->delete();
        $orangtua->orangtua()->delete();
        $orangtua->delete();

        return redirect('admin/orangtua')->with('success', 'Berhasil menghapus Orangtua');
    }
}
