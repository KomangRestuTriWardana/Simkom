@extends('pengurus.layout.master')

@section('page_title', 'Laporan Keuangan')

@section('content')
<!-- x-data Alpine.js untuk mengatur status modal dan tab jenis transaksi -->
<div class="space-y-6" x-data="{ openModal: false, jenisTransaksi: 'Pemasukan' }">
    
    <!-- Tampilkan Notifikasi Sukses -->
    @if(session('success'))
        <div class="p-4 bg-emerald-100 border border-emerald-200 text-emerald-700 rounded-xl font-semibold text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tampilkan Error Validasi Jika Ada -->
    @if($errors->any())
        <div class="p-4 bg-red-100 border border-red-200 text-red-700 rounded-xl font-semibold text-sm">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Bar Informasi Ringkasan Kas Dinamis -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Pemasukan</p>
                <p class="text-xl font-bold text-emerald-600">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</p>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-red-50 text-red-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Pengeluaran</p>
                <p class="text-xl font-bold text-red-600">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-50 text-[#203184] rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Saldo Kas</p>
                <p class="text-xl font-bold text-[#203184]">Rp {{ number_format($saldoKas, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <!-- Buku Kas Organisasi -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center">
            <h3 class="font-bold text-slate-800">Buku Kas Organisasi</h3>
            <div class="flex gap-2">
                <!-- DROPDOWN EXPORT (Interaktif dengan Alpine.js) -->
<div class="relative" x-data="{ openExport: false }">
    <button @click="openExport = !openExport" @click.away="openExport = false" class="bg-white border border-slate-200 text-slate-600 px-4 py-2 rounded-xl text-xs font-bold hover:bg-slate-50 transition-all flex items-center gap-2 cursor-pointer focus:outline-none">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
        <span>Export PDF/Excel</span>
        <svg class="w-3 h-3 transition-transform duration-200" :class="openExport ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
    </button>
    
    <!-- Menu Pilihan Unduh -->
    <div x-show="openExport" 
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="absolute right-0 mt-2 w-48 bg-white rounded-2xl border border-slate-100 shadow-xl py-2 z-50 text-left" 
         x-cloak>
        <a href="{{ route('pengurus.laporan.export.pdf') }}" target="_blank" class="flex items-center gap-3 px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-slate-50 transition-all">
            <span class="text-red-500">🔴</span> Export ke PDF (.pdf)
        </a>
        <a href="{{ route('pengurus.laporan.export.excel') }}" class="flex items-center gap-3 px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-slate-50 transition-all border-t border-slate-50">
            <span class="text-emerald-500">🟢</span> Export ke Excel (.xlsx)
        </a>
    </div>
</div>
                <!-- Menampilkan Modal Ketika di-klik -->
                <button @click="openModal = true" class="bg-[#203184] text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-blue-900 transition-all flex items-center gap-2 cursor-pointer">
                    + Catat Transaksi
                </button>
            </div>
        </div>
        
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50">
                    <th class="p-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Keterangan</th>
                    <th class="p-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Kategori</th>
                    <th class="p-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Tanggal</th>
                    <th class="p-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Jenis</th>
                    <th class="p-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider text-right">Jumlah</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($keuangans as $trx)
                <tr class="hover:bg-slate-50 transition-all">
                    <td class="p-4 text-sm font-semibold text-slate-700">
                        <div>
                            <span>{{ $trx->keterangan }}</span>
                            @if($trx->upload_bukti)
                                <div class="mt-1">
                                    <a href="{{ asset('storage/bukti_transaksi/' . $trx->upload_bukti) }}" target="_blank" class="text-[10px] text-blue-600 hover:underline flex items-center gap-1">
                                        📁 Lihat Bukti Fisik
                                    </a>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td class="p-4 text-xs text-slate-500">{{ $trx->kategori }}</td>
                    <td class="p-4 text-xs text-slate-500">{{ \Carbon\Carbon::parse($trx->tanggal)->translatedFormat('d M Y') }}</td>
                    <td class="p-4">
                        <span class="px-2.5 py-1 text-[10px] font-bold rounded-full {{ $trx->jenis_transaksi == 'Pemasukan' ? 'bg-emerald-50 text-emerald-600' : 'bg-red-50 text-red-600' }} uppercase">
                            {{ $trx->jenis_transaksi }}
                        </span>
                    </td>
                    <td class="p-4 text-sm font-bold text-right {{ $trx->jenis_transaksi == 'Pemasukan' ? 'text-emerald-600' : 'text-red-600' }}">
                        {{ $trx->jenis_transaksi == 'Pemasukan' ? '+' : '-' }}Rp {{ number_format($trx->jumlah, 0, ',', '.') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-sm text-slate-400">
                        Belum ada transaksi tercatat pada buku kas.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- MODAL CATAT TRANSAKSI BARU -->
    <div x-show="openModal" 
         class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-900/50 backdrop-blur-sm p-4" 
         x-cloak>
        <div @click.away="openModal = false" class="bg-white w-full max-w-xl rounded-3xl shadow-2xl overflow-hidden p-8 relative">
            
            <div class="flex justify-between items-center mb-6 border-b border-slate-100 pb-4">
                <h3 class="font-bold text-lg text-slate-800">Catat Transaksi Baru</h3>
                <button type="button" @click="openModal = false" class="p-2 text-slate-400 hover:text-red-500 rounded-full cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Form input transaksi -->
            <form action="{{ route('pengurus.laporan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-left">
                @csrf
                
                <!-- Jenis Transaksi (Tabs switcher) -->
                <div>
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-2">Jenis Transaksi</label>
                    <div class="grid grid-cols-2 gap-2 bg-slate-50 p-1 rounded-xl">
                        <button type="button" 
                                @click="jenisTransaksi = 'Pemasukan'" 
                                :class="jenisTransaksi === 'Pemasukan' ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-slate-500 hover:text-slate-800'"
                                class="py-2.5 text-xs font-bold rounded-lg transition-all text-center">
                            Pemasukan
                        </button>
                        <button type="button" 
                                @click="jenisTransaksi = 'Pengeluaran'" 
                                :class="jenisTransaksi === 'Pengeluaran' ? 'bg-red-50 text-red-700 shadow-sm' : 'text-slate-500 hover:text-slate-800'"
                                class="py-2.5 text-xs font-bold rounded-lg transition-all text-center">
                            Pengeluaran
                        </button>
                    </div>
                    <!-- Input Hidden Penampung Status Transaksi -->
                    <input type="hidden" name="jenis_transaksi" :value="jenisTransaksi">
                </div>

                <!-- Keterangan Transaksi -->
                <div class="space-y-1">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">Keterangan</label>
                    <input type="text" name="keterangan" placeholder="Contoh: Iuran anggota bulan agustus..." required class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm outline-none focus:border-blue-500 focus:bg-white transition-all">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Jumlah Uang -->
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">Jumlah (RP)</label>
                        <input type="number" name="jumlah" placeholder="Contoh: 50000" required class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm outline-none focus:border-blue-500 focus:bg-white transition-all">
                    </div>
                    <!-- Tanggal Transaksi -->
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">Tanggal</label>
                        <input type="date" name="tanggal" required class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm outline-none focus:border-blue-500 focus:bg-white transition-all">
                    </div>
                </div>

                <!-- Kategori Transaksi -->
                <div class="space-y-1">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">Kategori</label>
                    <input type="text" name="kategori" placeholder="Contoh: Iuran, Sponsor, Operasional, Kegiatan..." required class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm outline-none focus:border-blue-500 focus:bg-white transition-all">
                </div>

                <!-- Upload Bukti Transaksi -->
                <div class="space-y-1">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">Upload Bukti Fisik (Opsional)</label>
                    <div class="border border-slate-200 rounded-xl p-4 bg-slate-50 flex items-center justify-between">
                        <input type="file" name="upload_bukti" class="text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer" />
                    </div>
                </div>

                <!-- Tombol aksi -->
                <div class="flex justify-end gap-2 pt-4 border-t border-slate-100 mt-6">
                    <button type="button" @click="openModal = false" class="px-6 py-2.5 border border-slate-200 text-slate-600 rounded-xl text-xs font-bold hover:bg-slate-50 cursor-pointer">Batal</button>
                    <button type="submit" class="px-6 py-2.5 bg-[#203184] text-white rounded-xl text-xs font-bold hover:bg-blue-900 cursor-pointer">Simpan Transaksi</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection