<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Menghubungkan fitur autentikasi Laravel ke MySQL

class AuthController extends Controller
{
    // 1. Menampilkan halaman form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // 2. Memproses data login murni menggunakan USERNAME & PASSWORD
    public function login(Request $request)
    {
    $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    // Mengambil kredensial dari request
    $credentials = $request->only('username', 'password');

    // Coba login dengan username
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('dashboard');
    }

    // Jika gagal
    return back()->with('error', 'Username atau password salah!')->withInput($request->only('username'));
}

    // 3. Proses Keluar Sistem (Logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}