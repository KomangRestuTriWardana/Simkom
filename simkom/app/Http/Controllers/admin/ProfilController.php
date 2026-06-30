<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $organisasis = Organisasi::all();
        return view('admin.profil', compact('organisasis'));
    }

    public function update(Request $request)
{
    $request->validate([
        'id' => 'required',
        'nama_organisasi' => 'required',
        // tambahkan validasi field lainnya
    ]);

    $org = Organisasi::findOrFail($request->id);
    $org->update($request->all());

    return back()->with('success', 'Data berhasil diperbarui!');
}

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $organisasi = Organisasi::findOrFail($id);
        $organisasi->status = $request->status;
        $organisasi->save();

        return redirect()->back()->with('success', 'Status organisasi berhasil diperbarui.');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_organisasi' => 'required|string|max:255',
        'singkatan' => 'required|string|max:20',
    ]);

    // Menggunakan data dari request, dan mengisi kolom wajib lainnya dengan nilai default '-'
    \App\Models\Organisasi::create([
        'nama_organisasi'     => $request->nama_organisasi,
        'singkatan'           => $request->singkatan,
        'periode_kepengurusan'=> $request->periode_kepengurusan ?? '-',
        'dosen_pembimbing'    => $request->dosen_pembimbing ?? '-',
        'email_organisasi'    => '-', 
        'nomor_kontak'        => '-',
        'visi'                => '-',
        'misi'                => '-',
        'struktur_organisasi' => '-',
        'status'              => 'Aktif', 
    ]);

    return redirect()->back()->with('success', 'Organisasi berhasil ditambahkan!');
}

public function destroy($id)
{
    $org = \App\Models\Organisasi::findOrFail($id);
    $org->delete();
    return redirect()->back()->with('success', 'Organisasi berhasil dihapus!');
}
    
}