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
            'name' => 'required',
            'nuptk' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:users',
            'telp' => 'nullable|unique:users',
            'password' => 'required'
        ], [
            'name.required' => 'Masukan nama',
            'nuptk.required' => 'Masukan nuptk',
            'alamat.required' => 'Masukan alamat',
            'email.required' => 'Email harus diisi!',
            'email.unique' => 'Email sudah digunakan!',
            'email.email' => 'Email yang dimasukan salah!',
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
                    'name' => 'required',
                    'nuptk' => 'required',
                    'alamat' => 'required',
                    'email' => 'required',
                    'telp' => 'nullable',
                ],
                [
                    'name.required' => 'Masukan nama',
                    'nuptk.required' => 'Masukan nuptk',
                    'alamat.required' => 'Masukan alamat',
                    'email.required' => 'Email harus diisi!',
                    // 'email.unique' => 'Email sudah digunakan!',
                    'email.email' => 'Email yang dimasukan salah!',
                    // 'telp.unique' => 'Nomor telepon sudah digunakan!',
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
            'name' => $request->name,
            'nuptk' => $request->nuptk,
            'alamat' => $request->alamat,
            'telp' => $request->alamat,
            'email' => $request->email,
            'password' => $password
        ]);

        return redirect('admin/guru')->with('status', 'Berhasil memperbarui guru');
    }

    public function destroy($id)
    {
        $guru = User::find($id);
        $guru->delete();

        return redirect('admin/guru')->with('success', 'Berhasil menghapus guru');
    }
}