<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mapel;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::get();

        return view('guru.mapel.index', compact('mapels'));
    }
}