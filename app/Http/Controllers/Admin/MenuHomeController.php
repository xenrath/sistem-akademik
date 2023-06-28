<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileSekolah;
use Illuminate\Http\Request;

class MenuHomeController extends Controller
{
    public function index() {
        $profilesekolah = ProfileSekolah::first();

        return view('admin.menu-home.index', compact('profilesekolah'));
    }

    public function update() {
        
    }
}
