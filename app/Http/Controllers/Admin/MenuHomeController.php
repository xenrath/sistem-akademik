<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileSekolah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuHomeController extends Controller
{
    public function index()
    {
        $profilesekolah = ProfileSekolah::first();

        return view('admin.menu-home.index', compact('profilesekolah'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'home_nama' => 'required',
            'home_judul' => 'required',
            'home_deskripsi' => 'required',
        ], [
            'home_nama' => 'Nama sekolah harus diisi!',
            'home_judul' => 'Judul harus diisi!',
            'home_deskripsi' => 'Deskripsi harus diisi!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        if ($request->home_gambar) {
            $home_gambar = $this->namagambar($request->home_gambar);
            $request->home_gambar->storeAs('public/uploads', $home_gambar);
        } else {
            $home_gambar = $request->home_gambar;
        }

        ProfileSekolah::where('id', 1)->update([
            'home_nama' => $request->home_nama,
            'home_judul' => $request->home_judul,
            'home_deskripsi' => $request->home_deskripsi,
            'home_gambar' => $home_gambar,
        ]);

        return back()->with('success', 'Berhasil memperbarui Menu Home');
    }

    public function namagambar($data)
    {
        $ext = $data->getClientOriginalExtension();
        $now = Carbon::now()->format('ymdhis');
        $rand = rand(10, 100);
        $nama = 'menu-home/' . $now . $rand . '.' . $ext;

        return $nama;
    }
}
