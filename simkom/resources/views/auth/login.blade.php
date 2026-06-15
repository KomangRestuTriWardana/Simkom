<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk ke Akun - SIMKOM</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-[#f5f8ff] min-h-screen flex m-0 p-0 overflow-x-hidden">

    <div class="flex w-full min-h-screen">
        
        <div class="hidden lg:flex lg:w-1/2 bg-[#23389B] text-white p-16 flex-col justify-between relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid)" />
                </svg>
            </div>

            <div class="flex items-center gap-3 z-10">
                <div class="w-10 h-10 border-2 border-white rounded-xl flex items-center justify-center font-bold tracking-tighter text-lg shadow-sm">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 6c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 12.2c-2.7 0-5.06-1.37-6.4-3.43.03-2.12 4.27-3.27 6.4-3.27 2.13 0 6.37 1.15 6.4 3.27-1.34 2.06-3.7 3.43-6.4 3.43z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-base font-bold tracking-wider leading-none uppercase">Simkom</h1>
                    <span class="text-[10px] tracking-widest text-blue-200 uppercase font-medium">Campus System</span>
                </div>
            </div>

            <div class="max-w-xl my-auto z-10">
                <h2 class="text-4xl font-bold tracking-tight leading-[1.2] mb-6">
                    Sistem Informasi<br>Manajemen Kegiatan<br>Organisasi Mahasiswa
                </h2>
                <p class="text-blue-100/80 text-sm leading-relaxed mb-8 font-light">
                    Platform terpadu untuk pengelolaan organisasi kemahasiswaan, kegiatan, keanggotaan, dan keuangan secara digital.
                </p>

                <ul class="space-y-3 text-sm text-blue-50/90 font-medium">
                    <li class="flex items-center gap-3">
                        <span class="w-1.5 h-1.5 bg-blue-300 rounded-full"></span> Manajemen Anggota & Rekrutmen
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-1.5 h-1.5 bg-blue-300 rounded-full"></span> Pencatatan Kegiatan Terpusat
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-1.5 h-1.5 bg-blue-300 rounded-full"></span> Pelaporan Keuangan Digital
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-1.5 h-1.5 bg-blue-300 rounded-full"></span> Registrasi Acara Online
                    </li>
                </ul>
            </div>

            <div class="text-xs text-blue-200/50 z-10">
                &copy; 2026 Universitas Nusantara
            </div>
        </div>

        <div class="w-full lg:w-1/2 bg-[#fcfdff] flex flex-col justify-center items-center p-8 sm:p-12 md:p-16 min-h-screen relative">
            
            <div class="w-full max-w-[420px] bg-white border border-gray-100 rounded-2xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.02)]">
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-1">Masuk ke Akun</h3>
                    <p class="text-xs text-gray-500">Gunakan akun resmi SIMKOM Anda</p>
                </div>

                @if(session('error'))
    <div class="mb-5 bg-red-50 border border-red-100 text-red-600 text-xs p-3 rounded-xl flex items-center gap-2">
        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
        </svg>
        <span>{{ session('error') }}</span>
    </div>
@endif

                <form action="{{ url('/login') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <div class="space-y-1.5">
                        <label for="username" class="text-[11px] font-bold tracking-wider text-gray-400 uppercase">Username / Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"/>
                                </svg>
                            </div>
                            <input type="text" name="username" id="username" required
                                class="w-full pl-10 pr-4 py-2.5 bg-[#f8fafc] border border-gray-200 rounded-xl text-sm transition-all focus:outline-none focus:border-[#23389B] focus:bg-white text-gray-700 placeholder-gray-400" 
                                placeholder="Masukkan username">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label for="password" class="text-[11px] font-bold tracking-wider text-gray-400 uppercase">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input type="password" name="password" id="password" required
                                class="w-full pl-10 pr-4 py-2.5 bg-[#f8fafc] border border-gray-200 rounded-xl text-sm transition-all focus:outline-none focus:border-[#23389B] focus:bg-white text-gray-700 placeholder-indigo-300" 
                                placeholder="••••••••••••">
                        </div>
                    </div>

                    <button type="submit" 
                        class="w-full bg-[#23389B] hover:bg-[#1a2b7a] text-white font-medium py-2.5 rounded-xl text-sm shadow-md transition-all duration-200 hover:shadow-lg mt-2 cursor-pointer text-center block border-0">
                        Masuk
                    </button>
                </form>

                <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                    <p class="text-[11px] text-gray-400 leading-relaxed max-w-[280px] mx-auto">
                        Sistem ini terintegrasi dengan Single Sign-On (SSO) kampus.<br>Hubungi admin jika mengalami masalah akses.
                    </p>
                </div>
            </div> <div class="text-[11px] tracking-wide text-gray-400 mt-8 absolute bottom-6">
                SIMKOM v2.1 &bull; Universitas Nusantara &bull; 2026
            </div>
        </div>

    </div>

</body>
</html>