@extends('pengurus.layout.master')

@section('content')
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-bold text-slate-800">Himpunan Mahasiswa Informatika</h2>
        <p class="text-sm text-slate-500">Periode Kepengurusan 2024/2025 · Aktif</p>
    </div>
    <span class="flex items-center gap-2 text-[10px] font-bold text-emerald-600 bg-emerald-50 px-4 py-1.5 rounded-full uppercase tracking-wider">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Organisasi Aktif
    </span>
</div>

<div class="grid grid-cols-4 gap-4 mb-8">
    @php
        $stats = [
            ['title' => 'TOTAL ANGGOTA', 'value' => '42', 'sub' => '↑ +9 bulan ini'],
            ['title' => 'KEGIATAN AKTIF', 'value' => '3', 'sub' => ''],
            ['title' => 'SALDO KAS', 'value' => 'Rp 4,2 jt', 'sub' => '↑ +Rp 1,1 jt'],
            ['title' => 'PENDAFTAR BARU', 'value' => '5', 'sub' => '↓ Menunggu review']
        ];
    @endphp

    @foreach($stats as $stat)
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <p class="text-[10px] font-bold text-slate-400 tracking-widest mb-2">{{ $stat['title'] }}</p>
        <p class="text-3xl font-bold text-slate-800 mb-1">{{ $stat['value'] }}</p>
        @if($stat['sub'])
            <p class="text-[10px] font-medium {{ str_contains($stat['sub'], '↓') ? 'text-red-500' : 'text-emerald-500' }}">{{ $stat['sub'] }}</p>
        @endif
    </div>
    @endforeach
</div>

<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm mb-6">
    <h3 class="font-bold text-slate-800 mb-4">Kegiatan Mendatang</h3>
    <div class="space-y-4">
        @foreach([['Rapat Anggota Bulanan', '20 Agu 2025', '5h'], ['Workshop Desain UI/UX', '28 Agu 2025', '13h'], ['Seminar Nasional TI', '5 Sep 2025', '21h']] as $kegiatan)
        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-100">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">🕒</div>
                <div>
                    <p class="font-semibold text-sm">{{ $kegiatan[0] }}</p>
                    <p class="text-[10px] text-slate-400 font-medium uppercase">{{ $kegiatan[1] }}</p>
                </div>
            </div>
            <span class="text-[10px] font-bold bg-white px-2 py-1 rounded border border-slate-200 text-blue-600">{{ $kegiatan[2] }}</span>
        </div>
        @endforeach
    </div>
</div>

<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-bold text-slate-800">Pendaftar Terbaru</h3>
        <a href="#" class="text-xs text-blue-600 font-semibold hover:underline">Lihat Semua</a>
    </div>
    <div class="space-y-4">
        @foreach([['Rizky Pratama', '2023IF005678 - Teknik Informatika', 'Menunggu', 'amber'], ['Dewi Lestari', '2023SI002345 - Sistem Informasi', 'Menunggu', 'amber'], ['Muhammad Iqbal', '2022IF009012 - Teknik Informatika', 'Diterima', 'emerald']] as $pendaftar)
        <div class="flex items-center justify-between py-2 border-b border-slate-50 last:border-0">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-600">{{ substr($pendaftar[0], 0, 1) }}</div>
                <div>
                    <p class="font-semibold text-sm">{{ $pendaftar[0] }}</p>
                    <p class="text-xs text-slate-400">{{ $pendaftar[1] }}</p>
                </div>
            </div>
            <span class="text-[10px] font-bold px-3 py-1 rounded-full bg-{{ $pendaftar[3] }}-50 text-{{ $pendaftar[3] }}-600">{{ $pendaftar[2] }}</span>
        </div>
        @endforeach
    </div>
</div>
@endsection