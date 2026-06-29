<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kegiatan;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalPengguna'    => User::where('role', 'anggota')->count(),
            'kegiatanAktif'    => Kegiatan::where('status_kegiatan', 'Terbuka')->count(),
            'totalUserHariIni' => User::whereDate('created_at', now()->format('Y-m-d'))->count(),
            'persentaseUser'   => 75, // Data statis untuk visual grafik
        ];

        return view('admin.dashboard', compact('data'));
    }
}