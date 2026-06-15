@extends('pengurus.layout.master')

@section('page_title', 'Laporan Keuangan')

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Pemasukan</p>
                <p class="text-xl font-bold text-emerald-600">Rp 13.600.000</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-red-50 text-red-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Pengeluaran</p>
                <p class="text-xl font-bold text-red-600">Rp 2.330.000</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-50 text-[#203184] rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Saldo Kas</p>
                <p class="text-xl font-bold text-[#203184]">Rp 11.270.000</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center">
            <h3 class="font-bold text-slate-800">Buku Kas Organisasi</h3>
            <div class="flex gap-2">
                <button class="bg-white border border-slate-200 text-slate-600 px-4 py-2 rounded-xl text-xs font-bold hover:bg-slate-50 transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Export PDF/Excel
                </button>
                <button class="bg-[#203184] text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-blue-900 transition-all flex items-center gap-2">
                    + Catat Transaksi
                </button>
            </div>
        </div>
        
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50">
                    <th class="p-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Kegiatan</th>
                    <th class="p-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Kategori</th>
                    <th class="p-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Tanggal</th>
                    <th class="p-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Jenis</th>
                    <th class="p-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider text-right">Jumlah</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach([
                    ['Iuran Anggota Agustus 2025', 'Iuran', '1 Agu 2025', 'Pemasukan', '+Rp 2.100.000', 'emerald'],
                    ['Sponsor Workshop UI/UX', 'Sponsor', '5 Agu 2025', 'Pemasukan', '+Rp 3.500.000', 'emerald'],
                    ['Pembelian ATK', 'Operasional', '7 Agu 2025', 'Pengeluaran', '-Rp 450.000', 'red'],
                    ['Cetak Banner Workshop', 'Kegiatan', '10 Agu 2025', 'Pengeluaran', '-Rp 380.000', 'red']
                ] as $trx)
                <tr class="hover:bg-slate-50 transition-all">
                    <td class="p-4 text-sm font-semibold text-slate-700">{{ $trx[0] }}</td>
                    <td class="p-4 text-xs text-slate-500">{{ $trx[1] }}</td>
                    <td class="p-4 text-xs text-slate-500">{{ $trx[2] }}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 text-[10px] font-bold rounded-full bg-{{ $trx[5] }}-50 text-{{ $trx[5] }}-600 uppercase">
                            {{ $trx[3] }}
                        </span>
                    </td>
                    <td class="p-4 text-sm font-bold text-right {{ str_contains($trx[4], '+') ? 'text-emerald-600' : 'text-red-600' }}">
                        {{ $trx[4] }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection