@extends('mahasiswa.layout.master')

@section('title', 'Dashboard Mahasiswa - SIMKOM')
@section('page_title', 'Dashboard')

@section('content')
    <div class="relative overflow-hidden bg-gradient-to-r from-[#2B47CE] to-[#4262FB] text-white rounded-2xl p-7 shadow-lg shadow-blue-600/10 flex justify-between items-center">
        <div class="space-y-1.5 z-10">
            <p class="text-xs text-blue-100 font-medium tracking-wide">Selamat datang kembali,</p>
            <h2 class="text-2xl font-bold tracking-tight">{{ Auth::user()->nama }}</h2>
            <p class="text-xs text-blue-200/90 font-light">Teknik Informatika • NIM: {{ Auth::user()->nim ?? '2021IF001234' }}</p>
        </div>
        <div class="absolute right-0 top-0 bottom-0 w-1/3 bg-white/5 rounded-l-full blur-xl pointer-events-none transform translate-x-10 scale-125"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)] flex items-start gap-4">
            <div class="w-10 h-10 bg-blue-50 border border-blue-100 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">Organisasi Diikuti</span>
                <h3 class="text-2xl font-bold text-slate-800 tracking-tight mt-0.5">{{ $statOrganisasi }}</h3>
                <p class="text-[11px] text-emerald-600 font-semibold mt-1 flex items-center gap-1">↑ <span class="font-medium text-slate-400">Aktif semester ini</span></p>
            </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)] flex items-start gap-4">
            <div class="w-10 h-10 bg-emerald-50 border border-emerald-100 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">Kegiatan Terdaftar</span>
                <h3 class="text-2xl font-bold text-slate-800 tracking-tight mt-0.5">{{ $statKegiatan }}</h3>
                <p class="text-[11px] text-emerald-600 font-semibold mt-1 flex items-center gap-1">↑ <span class="font-medium text-slate-400">3 akan datang</span></p>
            </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)] flex items-start gap-4">
            <div class="w-10 h-10 bg-amber-50 border border-amber-100 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
            </div>
            <div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">Pengumuman Baru</span>
                <h3 class="text-2xl font-bold text-slate-800 tracking-tight mt-0.5">{{ $statPengumuman }}</h3>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-[0_4px_20px_rgba(0,0,0,0.02)] flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-center mb-5">
                    <h3 class="text-sm font-bold text-slate-800 tracking-wide">Organisasi Saya</h3>
                    <a href="#" class="text-xs font-semibold text-blue-600 hover:underline">Lihat Semua</a>
                </div>

                <div class="space-y-3">
                    @foreach($organisasiSaya as $org)
                    <div class="border border-slate-100 bg-slate-50/50 rounded-xl p-3.5 flex justify-between items-center hover:border-slate-200 transition-all cursor-pointer">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 {{ $org['bg_color'] }} border rounded-xl flex items-center justify-center shrink-0">
                                <span class="font-bold text-xs uppercase tracking-wider">{{ $org['singkatan'] }}</span>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-800">{{ $org['nama'] }}</h4>
                                <span class="text-[10px] text-slate-400 font-medium">{{ $org['status'] }}</span>
                            </div>
                        </div>
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                    @endforeach
                </div>
            </div>

            <button class="w-full mt-4 bg-white hover:bg-slate-50 text-slate-500 border border-dashed border-slate-200 hover:border-slate-300 py-2.5 rounded-xl text-xs font-semibold flex items-center justify-center gap-1.5 transition-all cursor-pointer">
                <span>+ Daftar Organisasi Baru</span>
            </button>
        </div>

        <div class="lg:col-span-2 bg-white border border-slate-100 rounded-2xl p-6 shadow-[0_4px_20px_rgba(0,0,0,0.02)]">
            <div class="flex justify-between items-center mb-5">
                <h3 class="text-sm font-bold text-slate-800 tracking-wide">Pengumuman Terbaru</h3>
                <a href="#" class="text-xs font-semibold text-blue-600 hover:underline">Lihat Semua</a>
            </div>

            <div class="divide-y divide-slate-100">
                @foreach($pengumumanTerbaru as $info)
                <div class="py-3.5 first:pt-0 last:pb-0 flex justify-between items-start gap-4">
                    <div class="space-y-0.5">
                        <span class="text-[10px] font-semibold text-slate-400 block">{{ $info['penulis'] }}</span>
                        <h4 class="text-xs font-bold text-slate-800 hover:text-blue-600 transition-colors cursor-pointer">{{ $info['judul'] }}</h4>
                        <p class="text-[10px] text-slate-400 font-medium">{{ $info['waktu'] }}</p>
                    </div>
                    <span class="{{ $info['badge_color'] }} border px-2.5 py-0.5 rounded-md font-bold text-[9px] uppercase tracking-wider shrink-0">{{ $info['badge'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection