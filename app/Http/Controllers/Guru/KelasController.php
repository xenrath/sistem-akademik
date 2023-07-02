<?php

namespace App\Http\Controllers\Guru;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index()
    {
        $kelass = Kelas::get();
        return view('guru.kelas.index', compact('kelass'));
    }
}