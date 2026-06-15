@extends('admin.layout.master')

@section('page_title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-[11px] font-bold text-slate-400 uppercase">Total Organisasi</p>
            <h2 class="text-2xl font-bold text-slate-800 mt-1">26</h2>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-[11px] font-bold text-slate-400 uppercase">Total Pengguna</p>
            <h2 class="text-2xl font-bold text-slate-800 mt-1">1,847</h2>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-[11px] font-bold text-slate-400 uppercase">Kegiatan Aktif</p>
            <h2 class="text-2xl font-bold text-slate-800 mt-1">18</h2>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-[11px] font-bold text-slate-400 uppercase">Akun Hari Ini</p>
            <h2 class="text-2xl font-bold text-slate-800 mt-1">312</h2>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <h3 class="font-bold text-slate-800 mb-4">Aktivitas Sistem Terbaru</h3>
        <div class="space-y-4">
            <div class="text-sm p-4 border rounded-xl flex items-center gap-4">
                <span class="bg-emerald-100 text-emerald-600 px-2 py-1 rounded text-[10px] font-bold">BARU</span>
                <p class="text-slate-600">Organisasi baru didaftarkan: Komunitas Robotika Kampus</p>
            </div>
            <div class="text-sm p-4 border rounded-xl flex items-center gap-4">
                <span class="bg-amber-100 text-amber-600 px-2 py-1 rounded text-[10px] font-bold">SUSPEND</span>
                <p class="text-slate-600">Akun disuspend: ahmad.fauzi@student.univ.ac.id</p>
            </div>
        </div>
    </div>
</div>
@endsection