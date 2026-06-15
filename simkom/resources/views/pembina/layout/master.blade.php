<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title', 'Dashboard Pembina') - SIMKOM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-[#F8FAFC] text-gray-800 h-screen flex m-0 p-0 overflow-hidden">

    @include('pembina.layout.sidebar')

    <div class="flex-1 flex flex-col min-w-0 h-full overflow-hidden">
        <header class="bg-white border-b border-slate-100 h-16 px-8 flex justify-between items-center shrink-0">
            <span class="text-sm font-bold text-slate-800">@yield('page_title')</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-xs font-semibold text-slate-500 hover:text-red-600 flex items-center gap-1.5">
                    <span>Logout</span>
                </button>
            </form>
        </header>

        <main class="flex-1 overflow-y-auto p-8">
            <div class="max-w-[1400px] w-full mx-auto space-y-6">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>