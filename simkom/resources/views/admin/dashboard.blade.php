@extends('admin.layout.master')
@section('page_title', 'Dashboard Admin')

@section('content')
<!-- 1. Stats Grid (4 Kolom) -->
<div class="grid grid-cols-4 gap-4">
    @php
        $stats = [
            ['title' => 'TOTAL ORGANISASI', 'value' => '6', 'icon' => '🏢', 'color' => 'blue'],
            ['title' => 'TOTAL PENGGUNA', 'value' => $data['totalPengguna'], 'icon' => '👥', 'color' => 'indigo'],
            ['title' => 'KEGIATAN AKTIF', 'value' => $data['kegiatanAktif'], 'icon' => '📅', 'color' => 'emerald'],
            ['title' => 'USER HARI INI', 'value' => $data['totalUserHariIni'], 'icon' => '⚡', 'color' => 'amber'],
        ];
    @endphp
    @foreach($stats as $stat)
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 bg-{{$stat['color']}}-50 text-{{$stat['color']}}-600 rounded-xl flex items-center justify-center text-xl">
            {{ $stat['icon'] }}
        </div>
        <div>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">{{ $stat['title'] }}</p>
            <h3 class="text-xl font-bold text-slate-800">{{ $stat['value'] }}</h3>
        </div>
    </div>
    @endforeach
</div>

<!-- 2. Grafik Berdampingan -->
<div class="grid grid-cols-3 gap-6">
    <!-- Pertumbuhan Organisasi -->
    <div class="col-span-2 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <h3 class="font-bold text-slate-800 mb-6 text-sm">Pertumbuhan Organisasi</h3>
        <div class="h-48 flex items-end gap-3">
            @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'] as $bln)
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full bg-slate-50 rounded-t-lg h-full flex flex-col justify-end">
                    <div class="bg-blue-600 rounded-t-lg w-full" style="height: {{ rand(40, 90) }}%"></div>
                </div>
                <span class="text-[10px] font-bold text-slate-400">{{ $bln }}</span>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Kegiatan per Organisasi -->
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <h3 class="font-bold text-slate-800 mb-6 text-sm">Kegiatan per Organisasi</h3>
        <div class="space-y-4">
            @foreach(['Himpunan IF', 'Himpunan SI', 'UKM Basket'] as $org)
            <div class="space-y-1">
                <div class="flex justify-between text-xs font-semibold text-slate-600">
                    <span>{{ $org }}</span>
                    <span>{{ rand(5, 20) }}</span>
                </div>
                <div class="w-full bg-slate-100 rounded-full h-2">
                    <div class="bg-indigo-500 h-2 rounded-full" style="width: {{ rand(30, 90) }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- 3. Aktivitas Sistem Terbaru -->
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
    <h3 class="font-bold text-slate-800 mb-4 text-sm">Aktivitas Sistem Terbaru</h3>
    <div class="space-y-3">
        @php
            $logs = [
                ['text' => 'User "Budi" berhasil login', 'status' => 'Baru', 'color' => 'bg-emerald-100 text-emerald-700'],
                ['text' => 'Kegiatan "Workshop UI/UX" ditambahkan', 'status' => 'Proses', 'color' => 'bg-blue-100 text-blue-700'],
                ['text' => 'Data anggota berhasil diexport', 'status' => 'Selesai', 'color' => 'bg-slate-100 text-slate-600']
            ];
        @endphp
        @foreach($logs as $log)
        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl text-xs text-slate-600">
            <div class="w-2 h-2 rounded-full bg-blue-500"></div>
            {{ $log['text'] }}
            <span class="ml-auto px-2 py-0.5 rounded-full text-[9px] font-bold {{ $log['color'] }}">
                {{ $log['status'] }}
            </span>
            <span class="text-[10px] text-slate-400 ml-2">5 menit yang lalu</span>
        </div>
        @endforeach
    </div>
</div>
@endsection