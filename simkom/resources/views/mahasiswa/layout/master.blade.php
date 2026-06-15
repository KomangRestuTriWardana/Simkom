<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Mahasiswa - SIMKOM')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#F8FAFC] min-h-screen flex m-0 p-0 text-gray-800">

    <aside class="w-64 bg-[#203184] text-white flex flex-col justify-between p-5 shrink-0 shadow-xl min-h-screen">
        <div>
            <div class="flex items-center gap-3 mb-8 px-2">
                <div class="w-9 h-9 bg-white/10 border border-white/20 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <div>
                    <h1 class="text-sm font-extrabold tracking-wider uppercase m-0 leading-tight">SIMKOM</h1>
                    <span class="text-[9px] text-blue-200 uppercase tracking-widest font-medium">Campus System</span>
                </div>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 mb-6 flex items-center gap-2">
                <div class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></div>
                <span class="text-xs font-semibold text-blue-100 tracking-wide">Mahasiswa</span>
            </div>

            <p class="text-[10px] uppercase tracking-widest font-bold text-blue-300/60 px-2 mb-3">Navigation</p>
            <nav class="space-y-1">
                <a href="{{ route('mahasiswa.dashboard') }}" class="flex items-center justify-between {{ Route::is('mahasiswa.dashboard') ? 'bg-white/10 text-white font-semibold' : 'text-blue-200/80 hover:text-white hover:bg-white/5 font-medium' }} px-3.5 py-3 rounded-xl text-xs transition-all group">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 {{ Route::is('mahasiswa.dashboard') ? 'text-white' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                        <span>Dashboard</span>
                    </div>
                </a>
                
                <a href="{{ route('mahasiswa.kegiatan') }}" class="flex items-center gap-3 {{ Route::is('mahasiswa.kegiatan') ? 'bg-white/10 text-white font-semibold' : 'text-blue-200/80 hover:text-white hover:bg-white/5 font-medium' }} px-3.5 py-3 rounded-xl text-xs transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Pendaftaran Kegiatan</span>
                </a>

                <a href="{{ route('mahasiswa.anggota') }}" class="flex items-center gap-3 {{ Route::is('mahasiswa.anggota') ? 'bg-white/10 text-white font-semibold' : 'text-blue-200/80 hover:text-white hover:bg-white/5 font-medium' }} px-3.5 py-3 rounded-xl text-xs transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <span>Pendaftaran Anggota</span>
                </a>

                <a href="{{ route('mahasiswa.riwayat') }}" class="flex items-center gap-3 {{ Route::is('mahasiswa.riwayat') ? 'bg-white/10 text-white font-semibold' : 'text-blue-200/80 hover:text-white hover:bg-white/5 font-medium' }} px-3.5 py-3 rounded-xl text-xs transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Riwayat Aktivitas</span>
                </a>
            </nav>
        </div>

        <div class="border-t border-white/10 pt-4 flex items-center justify-between gap-2">
            <div class="flex items-center gap-2.5 overflow-hidden">
                <div class="w-8 h-8 rounded-full bg-blue-500 border border-white/20 flex items-center justify-center font-bold text-xs text-white uppercase shrink-0">
                    {{ substr(Auth::user()->nama, 0, 1) }}
                </div>
                <div class="overflow-hidden">
                    <p class="text-xs font-semibold text-white truncate m-0">{{ Auth::user()->nama }}</p>
                    <p class="text-[10px] text-blue-300 truncate m-0">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
        <header class="bg-white border-b border-slate-100 h-16 px-8 flex justify-between items-center shrink-0">
            <div class="flex items-center gap-2 text-sm font-semibold text-slate-800">
                <span>@yield('page_title', 'Dashboard')</span>
            </div>
            
            <div class="flex items-center gap-5">
                <div class="relative w-64">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" placeholder="Search..." class="w-full text-xs bg-slate-50 border border-slate-200 rounded-lg pl-9 pr-4 py-2 outline-none focus:border-blue-600 focus:bg-white transition-all">
                </div>

                <form action="{{ route('logout') }}" method="POST" class="m-0 border-l border-slate-200 pl-4">
                    @csrf
                    <button type="submit" class="flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-red-600 cursor-pointer border-0 bg-transparent p-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </header>

        <main class="p-8 max-w-[1400px] w-full mx-auto space-y-6">
            @yield('content')
        </main>
    </div>
</body>
</html>