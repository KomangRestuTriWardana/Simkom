<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Digunakan untuk menulis ke tabel laporans secara langsung

class LaporanController extends Controller
{
    public function index()
    {
        $keuangans = Keuangan::orderBy('tanggal', 'desc')->get();

        $totalPemasukan = Keuangan::where('jenis_transaksi', 'Pemasukan')->sum('jumlah');
        $totalPengeluaran = Keuangan::where('jenis_transaksi', 'Pengeluaran')->sum('jumlah');
        $saldoKas = $totalPemasukan - $totalPengeluaran;

        return view('pengurus.laporan', compact('keuangans', 'totalPemasukan', 'totalPengeluaran', 'saldoKas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_transaksi' => 'required|in:Pemasukan,Pengeluaran',
            'keterangan'      => 'required|string|max:255',
            'jumlah'          => 'required|numeric|min:1',
            'tanggal'         => 'required|date',
            'kategori'        => 'required|string|max:100',
            'upload_bukti'    => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $namaFile = null;

        if ($request->hasFile('upload_bukti')) {
            $file = $request->file('upload_bukti');
            $namaFile = time() . '_bukti_' . str_replace(' ', '_', $request->kategori) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('bukti_transaksi', $namaFile, 'public');
        }

        Keuangan::create([
            'jenis_transaksi' => $request->jenis_transaksi,
            'keterangan'      => $request->keterangan,
            'jumlah'          => $request->jumlah,
            'tanggal'         => $request->tanggal,
            'kategori'        => $request->kategori,
            'upload_bukti'    => $namaFile,
        ]);

        return redirect()->route('pengurus.laporan')->with('success', 'Transaksi kas berhasil dicatat!');
    }

    // 1. EKSPOR KE PDF + Simpan Riwayat di Tabel `laporans`
    public function exportPdf()
    {
        $keuangans = Keuangan::orderBy('tanggal', 'asc')->get();
        $totalPemasukan = Keuangan::where('jenis_transaksi', 'Pemasukan')->sum('jumlah');
        $totalPengeluaran = Keuangan::where('jenis_transaksi', 'Pengeluaran')->sum('jumlah');
        $saldoKas = $totalPemasukan - $totalPengeluaran;

        // Mencatat log aktivitas cetak ke database laporans sesuai struktur kolom Anda
        DB::table('laporans')->insert([
            'jenis_laporan'             => 'Laporan Keuangan Kas',
            'tanggal_generate_laporan'  => now()->format('Y-m-d'),
            'format_file_laporan'       => 'pdf',
            'created_at'                => now(),
            'updated_at'                => now(),
        ]);

        return view('pengurus.laporan_cetak_pdf', compact('keuangans', 'totalPemasukan', 'totalPengeluaran', 'saldoKas'));
    }

    // 2. EKSPOR KE EXCEL (CSV) + Simpan Riwayat di Tabel `laporans`
    public function exportExcel()
    {
        $keuangans = Keuangan::orderBy('tanggal', 'asc')->get();
        $fileName = 'Laporan_Buku_Kas_' . date('Ymd_His') . '.csv';

        // Mencatat log aktivitas cetak ke database laporans sesuai struktur kolom Anda
        DB::table('laporans')->insert([
            'jenis_laporan'             => 'Laporan Keuangan Kas',
            'tanggal_generate_laporan'  => now()->format('Y-m-d'),
            'format_file_laporan'       => 'xlsx',
            'created_at'                => now(),
            'updated_at'                => now(),
        ]);

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Tanggal', 'Keterangan', 'Kategori', 'Jenis', 'Jumlah (Rp)'];

        $callback = function() use($keuangans, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($keuangans as $trx) {
                fputcsv($file, [
                    $trx->tanggal,
                    $trx->keterangan,
                    $trx->kategori,
                    $trx->jenis_transaksi,
                    ($trx->jenis_transaksi == 'Pemasukan' ? '' : '-') . $trx->jumlah
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}