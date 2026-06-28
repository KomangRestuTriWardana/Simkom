<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Buku Kas Organisasi</title>
    <!-- Tailwind CSS CDN untuk layout yang cantik -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print {
                display: none;
            }
            body {
                background: white;
                color: black;
            }
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 p-8">

    <div class="max-w-4xl mx-auto bg-white p-10 rounded-2xl shadow-sm border border-slate-100">
        
        <!-- Header Cetak -->
        <div class="flex justify-between items-center border-b-2 border-slate-200 pb-6 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">LAPORAN BUKU KAS</h1>
                <p class="text-sm text-slate-500">Sistem Informasi Manajemen Komunitas (SIMKOM)</p>
            </div>
            <div class="text-right">
                <p class="text-sm font-bold text-slate-700">Tanggal Cetak:</p>
                <p class="text-sm text-slate-500">{{ date('d M Y') }}</p>
            </div>
        </div>

        <!-- Ringkasan Keuangan -->
        <div class="grid grid-cols-3 gap-4 mb-8">
            <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 text-center">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Total Pemasukan</p>
                <p class="text-lg font-bold text-emerald-600">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</p>
            </div>
            <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 text-center">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Total Pengeluaran</p>
                <p class="text-lg font-bold text-red-600">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
            </div>
            <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 text-center">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Saldo Kas Akhir</p>
                <p class="text-lg font-bold text-blue-900">Rp {{ number_format($saldoKas, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Tabel Transaksi -->
        <table class="w-full text-left border-collapse border border-slate-200 mb-8">
            <thead>
                <tr class="bg-slate-100">
                    <th class="border border-slate-200 p-3 text-xs font-bold text-slate-600 uppercase">Tanggal</th>
                    <th class="border border-slate-200 p-3 text-xs font-bold text-slate-600 uppercase">Keterangan</th>
                    <th class="border border-slate-200 p-3 text-xs font-bold text-slate-600 uppercase">Kategori</th>
                    <th class="border border-slate-200 p-3 text-xs font-bold text-slate-600 uppercase">Jenis</th>
                    <th class="border border-slate-200 p-3 text-xs font-bold text-slate-600 uppercase text-right">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($keuangans as $trx)
                <tr>
                    <td class="border border-slate-200 p-3 text-xs">{{ \Carbon\Carbon::parse($trx->tanggal)->translatedFormat('d M Y') }}</td>
                    <td class="border border-slate-200 p-3 text-xs font-semibold text-slate-700">{{ $trx->keterangan }}</td>
                    <td class="border border-slate-200 p-3 text-xs text-slate-500">{{ $trx->kategori }}</td>
                    <td class="border border-slate-200 p-3 text-xs font-bold {{ $trx->jenis_transaksi == 'Pemasukan' ? 'text-emerald-600' : 'text-red-600' }}">{{ $trx->jenis_transaksi }}</td>
                    <td class="border border-slate-200 p-3 text-xs font-bold text-right {{ $trx->jenis_transaksi == 'Pemasukan' ? 'text-emerald-600' : 'text-red-600' }}">
                        {{ $trx->jenis_transaksi == 'Pemasukan' ? '+' : '-' }}Rp {{ number_format($trx->jumlah, 0, ',', '.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Footer Tanda Tangan -->
        <div class="flex justify-end mt-16">
            <div class="text-center w-48">
                <p class="text-xs text-slate-500 mb-16">Bendahara Organisasi,</p>
                <p class="text-xs font-bold text-slate-800 border-b border-slate-400 pb-1">Siti Rahayu</p>
                <p class="text-[10px] text-slate-400">Pengurus SIMKOM</p>
            </div>
        </div>

        <!-- Tombol Aksi Cetak -->
        <div class="no-print mt-10 flex justify-end gap-2">
            <button onclick="window.close()" class="px-5 py-2 border border-slate-200 text-slate-600 rounded-xl text-xs font-bold hover:bg-slate-50 cursor-pointer">Tutup Halaman</button>
            <button onclick="window.print()" class="px-5 py-2 bg-[#203184] text-white rounded-xl text-xs font-bold hover:bg-blue-900 cursor-pointer">Cetak / Simpan PDF</button>
        </div>
    </div>

</body>
</html>