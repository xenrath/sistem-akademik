<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('layouts.login');
    }

    public function checkUser()
    {
        if(auth()->user()->isAdmin())
        {
            return redirect('admin');
        }

        elseif(auth()->user()->isGuru())
        {
            return redirect('guru');
        }
        
        elseif (auth()->user()->isKepsek())
        {
            return redirect('kepsek');
        }
    }
}