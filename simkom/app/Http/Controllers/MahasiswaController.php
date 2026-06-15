<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan Halaman Dashboard Utama Mahasiswa
     */
    public function dashboard()
    {
        $user = Auth::user();

        // 1. Mengambil data statistik
        $statOrganisasi = 2; 
        $statKegiatan = 7;
        $statPengumuman = 4;
        
        // 2. Mengambil daftar organisasi
        $organisasiSaya = [
            [
                'singkatan' => 'HMI',
                'nama' => 'Himpunan Mahasiswa Informatika',
                'status' => 'Anggota Aktif',
                'bg_color' => 'bg-blue-50 text-blue-600 border-blue-100'
            ],
            [
                'singkatan' => 'PSM',
                'nama' => 'Paduan Suara Mahasiswa',
                'status' => 'Anggota Aktif',
                'bg_color' => 'bg-emerald-50 text-emerald-600 border-emerald-100'
            ]
        ];

        // 3. Mengambil pengumuman terbaru
        $pengumumanTerbaru = [
            [
                'penulis' => 'BEM Universitas',
                'judul' => 'Rapat Koordinasi Kegiatan Semester Ganjil 2026',
                'waktu' => '2 jam yang lalu',
                'badge' => '• Info',
                'badge_color' => 'bg-blue-50 text-blue-600 border-blue-100'
            ],
            [
                'penulis' => 'Himpunan Mahasiswa Sistem Informasi',
                'judul' => 'Pendaftaran Peserta LDK Periode 2026/2027 Dibuka!',
                'waktu' => '5 jam yang lalu',
                'badge' => '• Baru',
                'badge_color' => 'bg-emerald-50 text-emerald-600 border-emerald-100'
            ],
            [
                'penulis' => 'Unit Kegiatan Seni',
                'judul' => 'Pentas Seni Akhir Semester — Segera Daftarkan Dirimu',
                'waktu' => '1 hari yang lalu',
                'badge' => '• Info',
                'badge_color' => 'bg-blue-50 text-blue-600 border-blue-100'
            ],
            [
                'penulis' => 'Paduan Suara Mahasiswa',
                'judul' => 'Audisi Anggota Baru Semester Ganjil 2026',
                'waktu' => '2 hari yang lalu',
                'badge' => '• Penting',
                'badge_color' => 'bg-amber-50 text-amber-600 border-amber-100'
            ]
        ];

        return view('mahasiswa.dashboard', compact(
            'statOrganisasi', 
            'statKegiatan', 
            'statPengumuman', 
            'organisasiSaya', 
            'pengumumanTerbaru'
        ));
    }

    /**
     * Menampilkan Halaman Riwayat Aktivitas
     */
    public function riwayat()
    {
        return view('mahasiswa.riwayat_aktivitas');
    }
}