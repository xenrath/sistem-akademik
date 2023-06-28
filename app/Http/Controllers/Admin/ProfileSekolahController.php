<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileSekolah;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileSekolahController extends Controller
{
    public function index()
    {
        $profilesekolah = ProfileSekolah::first();

        return view('admin.profile-sekolah.index', compact('profilesekolah'));
    }

    public function update(Request $request)
    {
        return $request;
        
        $profilesekolah = ProfileSekolah::first();

        if ($request->home_gambar) {
            $home_gambar = $this->namagambar($request->home_gambar);
            $request->home_gambar->storeAs('public/uploads', $home_gambar);
        } else {
            $home_gambar = $request->home_gambar;
        }

        $galeri_gambar = json_decode($profilesekolah->galeri_gambar);
        if ($request->galeri_gambar) {
            foreach ($request->galeri_gambar as $g) {
                $nama = $this->namagambar($g);
                array_push($galeri_gambar, $nama);
                $g->storeAs('public/uploads', $nama);
            }
        }

        if ($request->ppdb_flayer) {
            $ppdb_flayer = $this->namagambar($request->ppdb_flayer);
            $request->ppdb_flayer->storeAs('public/uploads', $ppdb_flayer);
        } else {
            $ppdb_flayer = $request->ppdb_flayer;
        }
        
        ProfileSekolah::where('id', 1)->update([
            'home_judul' => $request->home_judul,
            'home_deskripsi' => $request->home_deskripsi,
            'home_gambar' => $home_gambar,
            'about_deskripsi' => $request->about_deskripsi,
            'about_visi' => $request->about_visi,
            'about_misi' => $request->about_misi,
            'galeri_gambar' => $galeri_gambar,
            'ppdb_flayer' => $ppdb_flayer,
            'kontak_alamat' => $request->kontak_alamat,
            'kontak_email' => $request->kontak_email,
            'kontak_telp' => $request->kontak_telp,
            'kontak_latitude' => $request->kontak_latitude,
            'kontak_longitude' => $request->kontak_longitude,
            'link_facebook' => $request->link_facebook,
            'link_instagram' => $request->link_instagram,
        ]);

        return back()->with('success', 'Berhasil memperbarui Profile Sekolah');
    }

    public function test(Request $request) {
        return $request->galeri_gambar;
    }

    public function namagambar($data)
    {
        $ext = $data->getClientOriginalExtension();
        $now = Carbon::now()->format('ymdhis');
        $rand = rand(10, 100);
        $nama = 'profile-sekolah/' . $now . $rand . '.' . $ext;

        return $nama;
    }
}
