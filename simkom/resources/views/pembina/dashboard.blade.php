@extends('pembina.layout.master')

@section('page_title', 'Dashboard Monitoring')

@section('content')
<div class="bg-[#FFFBEB] border border-[#FDE68A] text-[#92400E] text-xs p-4 rounded-xl flex items-center gap-3 mb-6">
    <span>⚠️</span> Panel ini bersifat <b>read-only</b>. Anda dapat memantau data organisasi tanpa hak mengubah.
</div>

<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between mb-6">
    <div>
        <h2 class="text-base font-bold text-slate-800">Himpunan Mahasiswa Informatika</h2>
        <p class="text-[11px] text-slate-400 mt-0.5">Periode 2024/2025 - Anda sebagai Dosen Pembimbing</p>
    </div>
    <div class="flex gap-2">
        <span class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-bold uppercase">● Aktif</span>
        <span class="px-3 py-1 bg-purple-50 text-purple-600 rounded-full text-[10px] font-bold uppercase">● 42 Anggota</span>
    </div>
</div>

<div class="grid grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Anggota</p>
        <h2 class="text-2xl font-bold text-slate-800 mt-1">42</h2>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Kegiatan Aktif</p>
        <h2 class="text-2xl font-bold text-slate-800 mt-1">6</h2>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Saldo Kas</p>
        <h2 class="text-2xl font-bold text-slate-800 mt-1">Rp 12,7 jt</h2>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Tren Keuangan</p>
        <h2 class="text-2xl font-bold text-slate-800 mt-1">+35%</h2>
    </div>
</div>

<div class="grid grid-cols-2 gap-6">
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <h3 class="font-bold text-slate-800 mb-4">Kegiatan Organisasi</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between border-b border-slate-50 pb-3">
                <div><p class="text-xs font-semibold text-slate-700">Workshop UI/UX Design</p><p class="text-[10px] text-slate-400">28 Agu 2025 · 27 peserta</p></div>
                <span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded text-[9px] font-bold">● Aktif</span>
            </div>
            <div class="flex items-center justify-between border-b border-slate-50 pb-3">
                <div><p class="text-xs font-semibold text-slate-700">Seminar Nasional TI 2025</p><p class="text-[10px] text-slate-400">5 Sep 2025 · 80 peserta</p></div>
                <span class="px-2 py-0.5 bg-amber-50 text-amber-600 rounded text-[9px] font-bold">● Akan Datang</span>
            </div>
            <div class="flex items-center justify-between border-b border-slate-50 pb-3">
                <div><p class="text-xs font-semibold text-slate-700">LDK Angkatan 2025</p><p class="text-[10px] text-slate-400">12 Sep 2025 · 0 peserta</p></div>
                <span class="px-2 py-0.5 bg-amber-50 text-amber-600 rounded text-[9px] font-bold">● Akan Datang</span>
            </div>
            <div class="flex items-center justify-between pb-1">
                <div><p class="text-xs font-semibold text-slate-700">Rapat Anggota Agustus</p><p class="text-[10px] text-slate-400">20 Agu 2025 · 42 peserta</p></div>
                <span class="px-2 py-0.5 bg-emerald-50 text-emerald-600 rounded text-[9px] font-bold">● Selesai</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-bold text-slate-800">Struktur Kepengurusan</h3>
            <span class="text-[9px] text-slate-400">👁 View Only</span>
        </div>
        <table class="w-full text-left text-[11px]">
            <thead class="text-slate-400 uppercase">
                <tr><th class="pb-2">Nama</th><th class="pb-2">NIM</th><th class="pb-2">Jabatan</th><th class="pb-2">Status</th></tr>
            </thead>
            <tbody class="text-slate-700">
                <tr><td class="py-2 font-semibold">Siti Rahayu</td><td class="py-2 text-slate-500">2022IF001234</td><td class="py-2">Ketua Umum</td><td class="py-2 text-blue-600 font-bold">● Aktif</td></tr>
                <tr><td class="py-2 font-semibold">Doni Saputra</td><td class="py-2 text-slate-500">2022IF005678</td><td class="py-2">Sekretaris Umum</td><td class="py-2 text-blue-600 font-bold">● Aktif</td></tr>
                <tr><td class="py-2 font-semibold">Rina Marlina</td><td class="py-2 text-slate-500">2022IF009012</td><td class="py-2">Bendahara Umum</td><td class="py-2 text-blue-600 font-bold">● Aktif</td></tr>
                <tr><td class="py-2 font-semibold">Agung Prasetyo</td><td class="py-2 text-slate-500">2023IF002345</td><td class="py-2">Koord. Akademik</td><td class="py-2 text-blue-600 font-bold">● Aktif</td></tr>
                <tr><td class="py-2 font-semibold">Maya Sari</td><td class="py-2 text-slate-500">2023IF006789</td><td class="py-2">Koord. Sosial</td><td class="py-2 text-blue-600 font-bold">● Aktif</td></tr>
            </tbody>
        </table>
    </div>
</div>
@endsection