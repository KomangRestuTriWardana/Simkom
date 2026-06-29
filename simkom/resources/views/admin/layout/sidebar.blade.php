<aside class="w-64 bg-[#203184] text-white flex flex-col justify-between p-5 shrink-0 shadow-xl min-h-screen">
    <div>
        <div class="flex items-center gap-3 mb-8 px-2">
            <div class="w-9 h-9 bg-white/10 border border-white/20 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-2m-9-3H7m2 0h2m1 0h2m2 0h2"></path></svg>
            </div>
            <div>
                <h1 class="text-sm font-extrabold tracking-wider uppercase m-0 leading-tight">SIMKOM</h1>
                <span class="text-[9px] text-blue-200 uppercase tracking-widest font-medium">CAMPUS SYSTEM</span>
            </div>
        </div>

        <div class="bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 mb-6 flex items-center gap-2">
            <div class="w-2 h-2 rounded-full bg-purple-400 animate-pulse"></div>
            <span class="text-xs font-semibold text-blue-100 tracking-wide">Administrator</span>
        </div>

        <p class="text-[10px] uppercase tracking-widest font-bold text-blue-300/60 px-2 mb-3">Navigation</p>
        <nav class="space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-xs transition-all {{ Route::is('admin.dashboard') ? 'bg-white/10 text-white font-semibold' : 'text-blue-200/80 hover:text-white hover:bg-white/5' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 ２H6a２ ２ ０ ０１－２ －２v－４zM１４ Ａ２ Ｂ２ Ｃ２ Ｄ２ Ｅ２ Ｆ２ Ｇ２ Ｈ２ Ｉ２ Ｊ２ Ｋ２ Ｌ２ Ｍ２ Ｎ２ Ｏ２ Ｐ２ Ｑ２ Ｒ２ Ｓ２ Ｔ２ Ｕ２ Ｖ２ Ｗ２ Ｘ２ Ｙ２ Ｚ２"></path></svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.pengguna') }}" class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-xs transition-all {{ Route::is('admin.pengguna') ? 'bg-white/10 text-white font-semibold' : 'text-blue-₂₀₀/₈₀ hover:text-white hover:bg-white/5' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span>Manajemen Pengguna</span>
            </a>
            
            <a href="{{ route('admin.profil') }}" class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-xs transition-all {{ Route::is('admin.profil') ? 'bg-white/10 text-white font-semibold' : 'text-blue-200/80 hover:text-white hover:bg-white/5' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span>Profil Organisasi</span>
            </a>
        </nav>
    </div>

    <div class="border-t border-white/10 pt-4 flex items-center gap-2.5">
        <div class="w-8 h-8 rounded-full bg-green-500 border border-white/20 flex items-center justify-center font-bold text-xs text-white uppercase shrink-0">
            {{ substr(Auth::user()->nama, 0, 1) }}
        </div>
        <div class="overflow-hidden">
            <p class="text-xs font-semibold text-white truncate">{{ Auth::user()->nama }}</p>
            <p class="text-[10px] text-blue-300 truncate">{{ Auth::user()->email }}</p>
        </div>
    </div>
</aside>
