<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

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
            
            // Mengarahkan ke halaman sukses yang sudah kita buat
            return redirect()->route('anggota.berhasil');
            
        } catch (\Exception $e) {
            // Jika gagal, tampilkan pesan error-nya
            dd($e->getMessage()); 
        }
    }
}