<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profilesekolah = ProfileSekolah::first();

        return view('index', compact('profilesekolah'));
    }

    public function check_user()
    {
        if (auth()->user()->isAdmin()) {
            return redirect('admin');
        } elseif (auth()->user()->isGuru()) {
            return redirect('guru');
        }
    }
}