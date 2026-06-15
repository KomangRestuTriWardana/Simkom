<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Cek apakah user sudah login atau belum
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Ambil data role user yang sedang aktif login
        $userRole = Auth::user()->role;

        // 3. Cek apakah role user saat ini diizinkan masuk ke rute tersebut
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // 4. Jika mencoba masuk ke halaman yang bukan hak aksesnya, lempar balik ke dashboard aslinya
        if ($userRole == 'admin') { return redirect('/admin/dashboard'); }
        if ($userRole == 'pengurus') { return redirect('/pengurus/dashboard'); }
        if ($userRole == 'anggota') { return redirect('/mahasiswa/dashboard'); }
        if ($userRole == 'pembina') { return redirect('/pembina/dashboard'); }

        return redirect('/login');
    }
}