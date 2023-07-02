<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuAboutController extends Controller
{
    public function index()
    {
        $profilesekolah = ProfileSekolah::first();

        return view('admin.menu-about.index', compact('profilesekolah'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'about_deskripsi' => 'required',
            'about_visi' => 'required',
            'about_misi' => 'required',
        ], [
            'about_deskripsi' => 'Deskripsi harus diisi!',
            'about_visi' => 'Visi harus diisi!',
            'about_misi' => 'Misi harus diisi!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        ProfileSekolah::where('id', 1)->update([
            'about_deskripsi' => $request->about_deskripsi,
            'about_visi' => $request->about_visi,
            'about_misi' => $request->about_misi,
        ]);

        return back()->with('success', 'Berhasil memperbarui Menu Tentang Kami');
    }
}
