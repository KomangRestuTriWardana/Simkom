<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\PendaftaranKegiatan; // Pastikan model ini sudah di-import
use Illuminate\Support\Facades\Auth;

class PendaftaranKegiatanController extends Controller
{
    // Fungsi ini untuk halaman Daftar Semua Kegiatan
    public function index()
    {
        $kegiatans = \App\Models\Kegiatan::all();
        return view('mahasiswa.daftar_kegiatan', compact('kegiatans')); 
    }

    // Fungsi ini untuk halaman FORM pendaftaran per kegiatan
    public function showForm($id)
    {
        $kegiatan = \App\Models\Kegiatan::findOrFail($id);
        return view('mahasiswa.pendaftaran_kegiatan', compact('kegiatan'));
    }
    // Fungsi ini untuk menyimpan data pendaftaran ke database
    public function store(Request $request)
{
    // 1. Validasi
    $request->validate([
        'id_kegiatan' => 'required',
        'nama_lengkap' => 'required',
        'nim' => 'required',
        'nomor_hp' => 'required',
        'motivasi' => 'required',
    ]);

    // 2. Simpan ke database
    PendaftaranKegiatan::create([
        // Gunakan Auth untuk ID agar tidak bisa dimanipulasi dari form
        'id_user'        => Auth::user()->id_user, 
        'id_kegiatan'    => $request->id_kegiatan,
        'nama_lengkap'   => $request->nama_lengkap,
        'nim'            => $request->nim,
        'nomor_hp'       => $request->nomor_hp,
        'motivasi'       => $request->motivasi,
        'status'         => 'Pending',
        'tanggal_daftar' => now(),
    ]);

    // 3. Ambil data untuk halaman sukses
    $kegiatan = Kegiatan::find($request->id_kegiatan);

    return redirect()->route('kegiatan.berhasil')->with([
        'nama_kegiatan' => $kegiatan->nama_kegiatan,
        'penyelenggara' => $kegiatan->penyelenggara,
        'tanggal'       => $kegiatan->tanggal_kegiatan
    ]);
}
}