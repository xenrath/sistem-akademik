<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuKontakController extends Controller
{
    public function index()
    {
        $profilesekolah = ProfileSekolah::first();

        return view('admin.menu-kontak.index', compact('profilesekolah'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kontak_alamat' => 'required',
            'kontak_email' => 'required',
            'kontak_telp' => 'required',
            'kontak_latitude' => 'required',
            'kontak_longitude' => 'required',
            'link_facebook' => 'required',
            'link_instagram' => 'required',
        ], [
            'kontak_alamat' => 'Alamat harus diisi!',
            'kontak_email' => 'Email harus diisi!',
            'kontak_telp' => 'Telepon harus diisi!',
            'kontak_latitude' => 'Latitude harus diisi!',
            'kontak_longitude' => 'Longitude harus diisi!',
            'link_facebook' => 'Link facebook harus diisi!',
            'link_instagram' => 'Link instagram harus diisi!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        ProfileSekolah::where('id', 1)->update([
            'kontak_alamat' => $request->kontak_alamat,
            'kontak_email' => $request->kontak_email,
            'kontak_telp' => $request->kontak_telp,
            'kontak_latitude' => $request->kontak_latitude,
            'kontak_longitude' => $request->kontak_longitude,
            'link_facebook' => $request->link_facebook,
            'link_instagram' => $request->link_instagram,
        ]);

        return back()->with('success', 'Berhasil memperbarui Menu Kontak');
    }
}
