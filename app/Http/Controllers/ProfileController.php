<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Orangtua;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();

        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();

        if ($user->level == 'admin') {
            $validator = $this->admin($request, $user->id);
        } elseif ($user->level == 'guru') {
            $validator = $this->guru($request, $user->id);
        } elseif ($user->level == 'orangtua') {
            $validator = $this->orangtua($request, $user->id);
        }

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        if ($request->password) {
            $password = bcrypt($request->password);
        } else {
            $password = $user->password;
        }

        User::where('id', auth()->user()->id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $password
        ]);

        if ($user->level == 'guru') {
            if ($request->foto) {
                $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
                $namafoto = "guru/" . date('YmdHis') . "." . $foto;
                $request->foto->storeAs('public/uploads', $namafoto);
            } else {
                $namafoto = $user->guru->foto;
            }

            Guru::where('user_id', $user->id)->update([
                'nuptk' => $request->nuptk,
                'gender' => $request->gender,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
                'foto' => $namafoto
            ]);
        }

        if ($user->level == 'orangtua') {
            Orangtua::where('user_id', $user->id)->update([
                'nik' => $request->nik,
                'gender' => $request->gender,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
            ]);
        }

        return back()->with('success', 'Berhasil memperbarui Profile');
    }

    public function admin($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:users,username,' . $id,
        ], [
            'nama.required' => 'Nama harus diisi!',
            'username.required' => 'Username harus diisi!',
            'username.unique' => 'Username sudah digunakan!',
        ]);

        return $validator;
    }

    public function guru($request, $id)
    {
        $guru = Guru::where('user_id', $id)->first();

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nuptk' => 'required|unique:gurus,nuptk,' . $guru->id,
            'gender' => 'required',
            'telp' => 'required|unique:gurus,telp,' . $guru->id,
            'alamat' => 'required',
            'username' => 'required|unique:users,username,' . $id,
        ], [
            'nama.required' => 'Nama Guru harus diisi!',
            'nuptk.required' => 'NUPTK harus diisi!',
            'nuptk.unique' => 'NUPTK sudah digunakan!',
            'gender.required' => 'Jenis kelamin harus diisi!',
            'telp.required' => 'Nomor telepon harus diisi!',
            'telp.unique' => 'Nomor telepon sudah digunakan!',
            'alamat.required' => 'Alamat harus diisi!',
            'username.required' => 'Username harus diisi!',
            'username.unique' => 'Username sudah digunakan!',
        ]);

        return $validator;
    }

    public function orangtua($request, $id)
    {
        $orangtua = Orangtua::where('user_id', $id)->first();

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required|unique:orangtuas,nik,' . $orangtua->id,
            'gender' => 'required',
            'telp' => 'required|unique:orangtuas,telp,' . $orangtua->id,
            'alamat' => 'required',
            'username' => 'required|unique:users,username,' . $id,
        ], [
            'nama.required' => 'Nama Guru harus diisi!',
            'nik.required' => 'NIK harus diisi!',
            'nik.unique' => 'NIK sudah digunakan!',
            'gender.required' => 'Jenis kelamin harus diisi!',
            'telp.required' => 'Nomor telepon harus diisi!',
            'telp.unique' => 'Nomor telepon sudah digunakan!',
            'alamat.required' => 'Alamat harus diisi!',
            'username.required' => 'Username harus diisi!',
            'username.unique' => 'Username sudah digunakan!',
        ]);

        return $validator;
    }
}
