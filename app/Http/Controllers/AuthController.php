<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request)
{
    // Cek apakah pengguna sudah terautentikasi
    if (Auth::check()) {
        return redirect()->intended('/posts'); // Atau rute yang sesuai
    }

    // Jika belum terautentikasi, lakukan proses login
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->intended('/posts');
    }

    return redirect()->route('login')->with('error', 'Email atau password salah!');
}


    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
