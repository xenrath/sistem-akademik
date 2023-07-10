<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileSekolah;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuGaleriController extends Controller
{
    public function index()
    {
        $profilesekolah = ProfileSekolah::first();

        return view('admin.menu-galeri.index', compact('profilesekolah'));
    }

    public function update(Request $request)
    {
        $profilesekolah = ProfileSekolah::first();

        if ($profilesekolah->galeri_gambar) {
            $galeri_gambar = $profilesekolah->galeri_gambar;
        } else {
            $galeri_gambar = array();
        }

        if ($request->galeri_gambar) {
            foreach ($request->galeri_gambar as $g) {
                $nama = $this->namagambar($g);
                array_push($galeri_gambar, $nama);
                $g->storeAs('public/uploads', $nama);
            }
        }

        ProfileSekolah::where('id', 1)->update([
            'galeri_gambar' => $galeri_gambar,
        ]);

        return back()->with('success', 'Berhasil memperbarui Menu Galeri');
    }

    public function hapus($key)
    {
        $profilesekolah = ProfileSekolah::where('id', 1)->first();
        $gambar = $profilesekolah->galeri_gambar;
        unset($gambar[$key]);

        $galeri_gambar = array();

        foreach ($gambar as $g) {
            array_push($galeri_gambar, $g);
        }

        ProfileSekolah::where('id', 1)->update([
            'galeri_gambar' => $galeri_gambar
        ]);

        return back()->with('success', 'Berhasil menghapus Gambar');
    }

    public function namagambar($data)
    {
        $ext = $data->getClientOriginalExtension();
        $now = Carbon::now()->format('ymdhis');
        $rand = rand(10, 100);
        $nama = 'menu-galeri/' . $now . $rand . '.' . $ext;

        return $nama;
    }
}
