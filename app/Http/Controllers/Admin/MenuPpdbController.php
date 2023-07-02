<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileSekolah;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuPpdbController extends Controller
{
    public function index()
    {
        $profilesekolah = ProfileSekolah::first();

        return view('admin.menu-ppdb.index', compact('profilesekolah'));
    }

    public function update(Request $request)
    {
        $profilesekolah = ProfileSekolah::first();

        if ($request->ppdb_flayer) {
            $ppdb_flayer = $this->namagambar($request->ppdb_flayer);
            $request->ppdb_flayer->storeAs('public/uploads', $ppdb_flayer);
        } else {
            $ppdb_flayer = $profilesekolah->ppdb_flayer;
        }

        ProfileSekolah::where('id', 1)->update([
            'ppdb_flayer' => $ppdb_flayer,
        ]);

        return back()->with('success', 'Berhasil memperbarui Menu PPDB');
    }

    public function namagambar($data)
    {
        $ext = $data->getClientOriginalExtension();
        $now = Carbon::now()->format('ymdhis');
        $rand = rand(10, 100);
        $nama = 'menu-ppdb/' . $now . $rand . '.' . $ext;

        return $nama;
    }
}
