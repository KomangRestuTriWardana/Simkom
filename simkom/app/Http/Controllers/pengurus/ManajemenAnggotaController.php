<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Anggota; // Pastikan model sudah di-import
use Illuminate\Support\Facades\DB; // Gunakan DB facade atau Model
use Illuminate\Http\Request;

class ManajemenAnggotaController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status'); // Ambil status dari URL
        // Mengambil semua data dari tabel anggotas
        // Sesuaikan nama tabel jika perlu, saat ini berdasarkan screenshot adalah 'anggotas'
        $anggotas = DB::table('anggotas');

        if ($status) {
            $anggotas->where('status_anggota', $status);
        }

        $anggotas = $anggotas->latest()->get();
        return view('pengurus.anggota', compact('anggotas', 'status'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Aktif,NonAktif'
        ]);
        
        // Update database berdasarkan id
        DB::table('anggotas')
            ->where('id_anggota', $id) // Pastikan id_anggota sesuai dengan kolom di phpMyAdmin Anda
            ->update(['status_anggota' => $request->status]);

        return redirect()->back()->with('success', 'Status anggota berhasil diupdate.');
    }
}