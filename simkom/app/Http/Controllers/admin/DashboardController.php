<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Organisasi; // Sesuaikan dengan nama model Anda
use App\Models\User;       // Sesuaikan dengan nama model Anda
use App\Models\Kegiatan;   // Sesuaikan dengan nama model Anda

class DashboardController extends Controller
{
    public function index()
    {
        // Pastikan ini TIDAK dikomentari agar $data tersedia
    $data = [
        // 'totalOrganisasi'  => \App\Models\Organisasi::count(),
        'totalPengguna'    => \App\Models\User::where('role', 'anggota')->count(),
        'kegiatanAktif'    => \App\Models\Kegiatan::where('status_kegiatan', 'Terbuka')->count(),
        'totalUserHariIni' => \App\Models\User::whereDate('created_at', now()->format('Y-m-d'))->count(),
    ];

        return view('admin.dashboard', compact('data'));
    }
}