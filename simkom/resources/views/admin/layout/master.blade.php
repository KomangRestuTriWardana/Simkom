<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin - SIMKOM')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> 
        body { font-family: 'Plus Jakarta Sans', sans-serif; } 
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#F8FAFC] text-gray-800 h-screen flex m-0 p-0 overflow-hidden">

    @include('admin.layout.sidebar')

    <div class="flex-1 flex flex-col min-w-0 h-full overflow-hidden">
        <header class="bg-white border-b border-slate-100 h-16 px-8 flex justify-between items-center shrink-0">
            <div class="flex items-center gap-2 text-sm font-semibold text-slate-800">
                <span>@yield('page_title', 'Dashboard Admin')</span>
            </div>
            
            <div class="flex items-center gap-5">
                <form action="{{ route('logout') }}" method="POST" class="m-0 pl-4">
                    @csrf
                    <button type="submit" class="flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-red-600 cursor-pointer border-0 bg-transparent p-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-8">
            <div class="max-w-[1400px] w-full mx-auto space-y-6">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>