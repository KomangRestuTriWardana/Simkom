<?php

namespace App\Http\Controllers\Pembina;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use App\Models\Kegiatan;

class DashboardController extends Controller
{
    public function index()
    {
        // Data monitoring untuk Pembina
        $data = [
            'totalKegiatan' => Kegiatan::count(),
            'kegiatanPending' => Kegiatan::where('status_kegiatan', 'Menunggu Persetujuan')->count(),
            // 'totalOrganisasi' => Organisasi::count(),
        ];

        return view('pembina.dashboard', compact('data'));
    }
}