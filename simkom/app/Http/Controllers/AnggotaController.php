<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.pendaftaran_anggota');
    }

    public function store(Request $request)
    {
        // 1. Validasi
        $request->validate([
            'id_organisasi' => 'required',
            'nama_anggota'  => 'required',
            'nim_anggota'   => 'required',
            'program_studi' => 'required',
            'angkatan'      => 'required',
            'nomor_hp'      => 'required',
            'alamat'        => 'required',
            'motivasi'      => 'required',
            'dokumen_pendukung' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // 2. Proses upload file
        $namaFile = null;
        if ($request->hasFile('dokumen_pendukung')) {
            $file = $request->file('dokumen_pendukung');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('dokumen_anggota', $namaFile, 'public');
        }

        // 3. Simpan ke database
        try {
            \App\Models\Anggota::create([
                'id_organisasi'     => $request->id_organisasi,
                'nama_anggota'      => $request->nama_anggota,
                'nim_anggota'       => $request->nim_anggota,
                'program_studi'     => $request->program_studi,
                'angkatan'          => $request->angkatan,
                'nomor_hp'          => $request->nomor_hp,
                'alamat'            => $request->alamat,
                'motivasi'          => $request->motivasi,
                'dokumen_pendukung' => $namaFile,
                'status_anggota'    => 'Pending', // Sesuai default di DB
                'tanggal_bergabung' => now()->format('Y-m-d'),
            ]);
            
            // Mengarahkan ke halaman sukses dengan membawa id_organisasi sebagai parameter URL
            return redirect()->route('anggota.berhasil', ['id_organisasi' => $request->id_organisasi]);
            
        } catch (\Exception $e) {
            // Jika gagal, tampilkan pesan error-nya
            dd($e->getMessage()); 
        }
    }

    // Fungsi Baru untuk Mengambil Data Organisasi Langsung dari Database
    public function sukses($id_organisasi)
    {
        // Mencari data organisasi berdasarkan id_organisasi di database
        $organisasi = DB::table('organisasis')->where('id_organisasi', $id_organisasi)->first();

        // Jika data organisasi tidak ditemukan di database, gagalkan dengan error 404
        if (!$organisasi) {
            abort(404);
        }

        // Mengirimkan variabel $organisasi ke view pendaftaran_anggotaberhasil
        return view('mahasiswa.pendaftaran_anggotaberhasil', compact('organisasi'));
    }
}