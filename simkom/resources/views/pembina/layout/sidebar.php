<aside class="w-64 bg-[#203184] text-white flex flex-col justify-between p-5 shrink-0 shadow-xl min-h-screen">
    <div>
        <div class="flex items-center gap-3 mb-8 px-2">
            <div class="w-9 h-9 bg-white/10 border border-white/20 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-2m-9-3H7m2 0h2m1 0h2m2 0h2"></path></svg>
            </div>
            <div>
                <h1 class="text-sm font-extrabold tracking-wider uppercase m-0 leading-tight">SIMKOM</h1>
                <span class="text-[9px] text-blue-200 uppercase tracking-widest font-medium">Dosen Pembimbing</span>
            </div>
        </div>

        <div class="bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 mb-6 flex items-center gap-2">
            <div class="w-2 h-2 rounded-full bg-yellow-400"></div>
            <span class="text-xs font-semibold text-blue-100 tracking-wide">Dosen Pembimbing</span>
        </div>

        <nav class="space-y-1">
            <a href="{{ route('pembina.dashboard') }}" class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-xs transition-all {{ Route::is('pembina.dashboard') ? 'bg-white/10 text-white font-semibold' : 'text-blue-200/80 hover:text-white hover:bg-white/5' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                <span>Dashboard Monitoring</span>
            </a>
        </nav>
    </div>

    <div class="border-t border-white/10 pt-4 flex items-center gap-2.5">
        <div class="w-8 h-8 rounded-full bg-yellow-500 flex items-center justify-center font-bold text-xs text-white uppercase shrink-0">
            {{ substr(Auth::user()->nama ?? 'U', 0, 1) }}
        </div>
        <div class="overflow-hidden">
            <p class="text-xs font-semibold text-white truncate">{{ Auth::user()->nama ?? 'User' }}</p>
            <p class="text-[10px] text-blue-300 truncate">{{ Auth::user()->email ?? '-' }}</p>
        </div>
    </div>
</aside>