<?php

namespace App\Http\Controllers\Admin;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Orangtua;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::get();

        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelass = Kelas::all();
        $gurus = User::where('level', 'guru')->get();

        return view('admin.siswa.create', compact('gurus', 'kelass'));
    }

    public function store(Request $request)
    {
        $validator_siswa = Validator::make($request->all(), [
            'siswa_nama' => 'required',
            'siswa_gender' => 'required',
            'siswa_alamat' => 'required',
            'siswa_kelas_id' => 'required',
        ], [
            'siswa_nama.required' => 'Nama siswa harus diisi!',
            'siswa_gender.required' => 'Jenis kelamin siswa harus dipilih!',
            'siswa_alamat.required' => 'Alamat siswa harus diisi!',
            'siswa_kelas_id.required' => 'Kelas siswa harus dipilih',
        ]);

        $error_siswa = array();

        if ($validator_siswa->fails()) {
            $error_siswa = $validator_siswa->errors()->all();
        }

        $validator_orangtua = Validator::make($request->all(), [
            'orangtua_nama' => 'required',
            'orangtua_nik' => 'required',
            'orangtua_gender' => 'required',
            'orangtua_telp' => 'required|unique:orangtuas,telp',
            'orangtua_alamat' => 'required',
        ], [
            'orangtua_nama.required' => 'Nama orangtua harus diisi!',
            'orangtua_nik.required' => 'NIK orangtua harus diisi!',
            'orangtua_gender.required' => 'Jenis kelamin siswa harus dipilih!',
            'orangtua_telp.required' => 'Nomor telepon orangtua harus diisi!',
            'orangtua_telp.unique' => 'Nomor telepon orangtua sudah digunakan!',
            'orangtua_alamat.required' => 'Alamat orangtua harus diisi!',
        ]);

        $error_orangtua = array();

        if ($validator_orangtua->fails()) {
            $error_orangtua = $validator_orangtua->errors()->all();
        }

        if (count($error_siswa) > 0 || count($error_orangtua) > 0) {
            return back()->withInput()
                ->with('error_siswa', $error_siswa)
                ->with('error_orangtua', $error_orangtua);
        }

        $kelas = Kelas::where('id', $request->siswa_kelas_id)->first();
        $nis = $this->nis($kelas->kelas);

        $user = User::create([
            'username' => $nis,
            'password' => bcrypt($nis),
            'nama' => $request->orangtua_nama,
            'level' => 'orangtua'
        ]);

        Orangtua::create([
            'user_id' => $user->id,
            'nik' => $request->orangtua_nik,
            'gender' => $request->orangtua_gender,
            'telp' => $request->orangtua_telp,
            'alamat' => $request->orangtua_alamat
        ]);

        Siswa::create([
            'nama' => $request->siswa_nama,
            'nis' => $nis,
            'gender' => $request->siswa_gender,
            'alamat' => $request->siswa_alamat,
            'kelas_id' => $request->siswa_kelas_id,
            'orangtua_id' => $user->id
        ]);

        return redirect('admin/siswa')->with('success', 'Berhasil menambahkan Siswa');
    }

    public function show($id)
    {
        $siswa = Siswa::where('id', $id)->first();

        return view('admin.siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $kelass = Kelas::all();
        $gurus = User::where('level', 'guru')->get();

        return view('admin.siswa.update', compact('siswa', 'orangtua', 'kelass', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required',
        ], [
            'nama.required' => 'Nama siswa harus diisi!',
            'gender.required' => 'Jenis kelamin siswa harus dipilih!',
            'alamat.required' => 'Alamat siswa harus diisi!',
            'kelas_id.required' => 'Kelas siswa harus dipilih',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Siswa::where('id', $id)->update([
            'nama' => $request->nama,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect('admin/siswa')->with('success', 'Berhasil memperbarui Siswa');
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect('admin/siswa')->with('success', 'Berhasil menghapus Siswa');
    }

    public function nis($kelas)
    {
        $tahun = Carbon::now()->subYears($kelas - 1)->format('Y');

        $siswas = Siswa::whereHas('kelas', function ($query) use ($kelas) {
            $query->where('kelas', $kelas);
        })->get();

        if (count($siswas) > 0) {
            $jumlah = count($siswas) + 1;
            $urutan = sprintf("%03s", $jumlah);
        } else {
            $urutan = "001";
        }

        $nis = $tahun . $urutan;

        return $nis;
    }
}
