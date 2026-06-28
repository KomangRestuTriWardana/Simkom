<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Wajib ditambahkan untuk Query Builder

class ProfilController extends Controller
{
    public function index()
    {
        // Ambil data organisasi HMIF (ID = 1 sesuai database di phpMyAdmin)
        $id_organisasi = 1; 
        $organisasi = DB::table('organisasis')->where('id_organisasi', $id_organisasi)->first();

        if (!$organisasi) {
            abort(404, 'Data Organisasi Tidak Ditemukan');
        }

        // Mengembalikan view sambil mengirim data $organisasi
        return view('pengurus.profil', compact('organisasi'));
    }

    public function update(Request $request)
    {
        $id_organisasi = 1; // Samakan dengan ID di fungsi index

        // Validasi inputan sesuai struktur kolom di phpMyAdmin kamu
        $request->validate([
            'nama_organisasi'     => 'required|string|max:255',
            'singkatan'           => 'required|string|max:50',
            'periode_kepengurusan'=> 'required|string|max:50',
            'dosen_pembimbing'    => 'required|string|max:255',
            'email_organisasi'    => 'required|email|max:255',
            'nomor_kontak'        => 'required|string|max:20',
            'visi'                => 'required|string',
            'misi'                => 'required|string',
            'struktur_organisasi' => 'nullable|file|mimes:pdf,png,jpg,jpeg|max:10240',
        ]);

        // Siapkan data teks untuk diupdate
        $dataUpdate = [
            'nama_organisasi'      => $request->nama_organisasi,
            'singkatan'            => $request->singkatan,
            'periode_kepengurusan' => $request->periode_kepengurusan,
            'dosen_pembimbing'     => $request->dosen_pembimbing,
            'email_organisasi'     => $request->email_organisasi,
            'nomor_kontak'         => $request->nomor_kontak,
            'visi'                 => $request->visi,
            'misi'                 => $request->misi,
            'updated_at'           => now(),
        ];

        // Jalankan logika upload file struktur organisasi jika ada file baru
        if ($request->hasFile('struktur_organisasi')) {
            $file = $request->file('struktur_organisasi');
            $namaFile = 'struktur_' . strtolower($request->singkatan) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('struktur_organisasi', $namaFile, 'public');
            
            $dataUpdate['struktur_organisasi'] = $namaFile;
        }

        // Eksekusi perubahan ke database
        DB::table('organisasis')->where('id_organisasi', $id_organisasi)->update($dataUpdate);

        return redirect()->route('pengurus.profil')->with('success', 'Profil organisasi berhasil diperbarui!');
    }
}