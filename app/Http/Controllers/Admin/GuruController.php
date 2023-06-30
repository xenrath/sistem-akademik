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
        $gurus = User::where(['level' => 'guru'])->get();

        return view('admin/dataguru.index', compact('gurus'));
    }

    public function create()
    {
        return view('admin/dataguru.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nuptk' => 'required',
            'alamat' => 'required',
            'username' => 'required|unique:users',
            'telp' => 'nullable|unique:users',
            'password' => 'required'
        ], [
            'nama.required' => 'Masukan nama',
            'nuptk.required' => 'Masukan nuptk',
            'alamat.required' => 'Masukan alamat',
            'username.required' => 'Username harus diisi!',
            'username.unique' => 'Username sudah digunakan!',
            'telp.unique' => 'Nomor telepon sudah digunakan!',
            'password.required' => 'Masukan password',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        User::create(array_merge(
            $request->all(),
            [
                'level' => 'guru'
            ]
        ));

        return redirect('admin/guru')->with('success', 'Berhasil menambahkan guru');
    }

    public function show(User $guru)
    {
        return view('admin/dataguru.show', compact('guru'));
    }

    public function edit($id)
    {
        $guru = User::where('id', $id)->first();
        return view('admin/dataguru.update', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();

        if ($user->level == 'admin') {
            $validator = Validator::make(
                $request->all(),
                [
                    'nama' => 'required',
                    'nuptk' => 'required',
                    'alamat' => 'required',
                    'username' => 'required',
                    'telp' => 'nullable',
                ],
                [
                    'nama.required' => 'Masukan nama',
                    'username.required' => 'Masukan username',
                    'nuptk.required' => 'Masukan nuptk',
                    'alamat.required' => 'Masukan alamat',
                    'telp.required' => 'Masukan No telpone',
                ]
            );
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


        User::where('id', $id)->update([
            'nama' => $request->nama,
            'nuptk' => $request->nuptk,
            'alamat' => $request->alamat,
            'telp' => $request->alamat,
            'username' => $request->username,
            'password' => $password
        ]);

        return redirect('admin/guru')->with('success', 'Berhasil memperbarui guru');
    }

    public function destroy($id)
    {
        $guru = User::find($id);
        $guru->siswa()->delete();
        $guru->delete();

        return redirect('admin/guru')->with('success', 'Berhasil menghapus guru');
    }
}