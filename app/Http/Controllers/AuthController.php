<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect('check-user');
        } else {
            return view('login');
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return redirect('login')->with('error', array('User tidak ditemukan'));
        }

        $auth = Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ]);

        if ($auth) {
            return redirect('check-user');
        } else {
            return back()->with('error', array('Email atau password salah'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
