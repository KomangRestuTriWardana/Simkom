<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = \App\Models\Kegiatan::all(); // Mengambil semua data dari tabel kegiatans
    return view('pengurus.kegiatan', compact('kegiatans'));
    }
    public function store(Request $request) {
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'kuota_peserta' => 'required|numeric',
            'lokasi_kegiatan' => 'required',
        ]);
        \App\Models\Kegiatan::create($request->all());
        return redirect()->route('pengurus.kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan!');
}
public function edit($id) {
    $kegiatan = \App\Models\Kegiatan::findOrFail($id);
    // Tampilkan view edit
}
public function update(Request $request, $id) {
    $kegiatan = \App\Models\Kegiatan::findOrFail($id);
        $kegiatan->update($request->all());
        return redirect()->route('pengurus.kegiatan.index')->with('success', 'Kegiatan berhasil diubah!');
}
public function destroy($id) {
    $kegiatan = \App\Models\Kegiatan::findOrFail($id);
    $kegiatan->delete();
    return redirect()->back()->with('success', 'Kegiatan berhasil dihapus.');
}
}
