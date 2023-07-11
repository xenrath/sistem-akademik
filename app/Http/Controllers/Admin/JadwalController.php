<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Kelas;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index() {
        $kelass = Kelas::get();
        
        return view('admin.jadwal.index', compact('kelass'));
    }
}
