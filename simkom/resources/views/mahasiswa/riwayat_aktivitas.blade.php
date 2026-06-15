@extends('mahasiswa.layout.master')
@section('page_title', 'Riwayat Aktivitas')

@section('content')
<div class="max-w-6xl mx-auto py-8">
    <h2 class="text-xl font-bold text-slate-800 mb-6">Riwayat Kegiatan</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl border border-slate-200 flex justify-between items-center shadow-sm">
            <span class="text-slate-500 font-medium">Total Kegiatan</span>
            <span class="text-2xl font-bold text-indigo-600">6</span>
        </div>
        <div class="bg-white p-6 rounded-xl border border-slate-200 flex justify-between items-center shadow-sm">
            <span class="text-slate-500 font-medium">Hadir</span>
            <span class="text-2xl font-bold text-emerald-600">4</span>
        </div>
        <div class="bg-white p-6 rounded-xl border border-slate-200 flex justify-between items-center shadow-sm">
            <span class="text-slate-500 font-medium">Tidak Hadir / Pending</span>
            <span class="text-2xl font-bold text-amber-600">2</span>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center">
            <h3 class="font-bold text-slate-800">Riwayat Kegiatan</h3>
            <button class="flex items-center gap-2 px-4 py-2 border border-slate-300 rounded-lg text-sm font-medium text-slate-600">
                Export
            </button>
        </div>
        
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Kegiatan</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Tanggal</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Lokasi</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <tr>
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-800">Seminar Kewirausahaan Mahasiswa 2025</div>
                        <div class="text-xs text-slate-400">BEM Universitas</div>
                    </td>
                    <td class="px-6 py-4 text-slate-600">10 Mei 2025</td>
                    <td class="px-6 py-4 text-slate-600">Aula Utama Kampus</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-bold bg-emerald-50 text-emerald-600 rounded-full border border-emerald-100">● Hadir</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-800">Workshop Git & GitHub untuk Pemula</div>
                        <div class="text-xs text-slate-400">Komunitas Developer Kampus</div>
                    </td>
                    <td class="px-6 py-4 text-slate-600">25 April 2025</td>
                    <td class="px-6 py-4 text-slate-600">Lab Komputer B-201</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-bold bg-emerald-50 text-emerald-600 rounded-full border border-emerald-100">● Hadir</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-800">LDK Angkatan 2025 - Hari 1</div>
                        <div class="text-xs text-slate-400">Himpunan Mahasiswa Informatika</div>
                    </td>
                    <td class="px-6 py-4 text-slate-600">14 April 2025</td>
                    <td class="px-6 py-4 text-slate-600">Bumi Perkemahan Cibodas</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-bold bg-rose-50 text-rose-500 rounded-full border border-rose-100">● Tidak Hadir</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection