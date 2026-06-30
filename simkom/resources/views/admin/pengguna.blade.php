@extends('admin.layout.master')
@section('page_title', 'Manajemen Pengguna')

@section('content')
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm" x-data="{ search: '', roleFilter: 'Semua' }">
    <div class="flex justify-between items-center mb-6">
        <h2 class="font-bold text-slate-800 text-lg"></h2>
    </div>

    <!-- Fitur Pencarian & Filter -->
    <div class="flex items-center justify-between mb-6 gap-4">
        <div class="relative flex-1 max-w-md">
            <input type="text" x-model="search" placeholder="Cari nama atau email..." 
                   class="w-full pl-10 pr-4 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <svg class="w-4 h-4 absolute left-3 top-2.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>

        <div class="flex gap-1 bg-slate-100 p-1 rounded-lg">
            @foreach(['Semua', 'Mahasiswa', 'Pengurus', 'Admin', 'Dosen Pembimbing'] as $role)
                <button @click="roleFilter = '{{ $role }}'" 
                        :class="roleFilter === '{{ $role }}' ? 'bg-white shadow-sm text-blue-600' : 'text-slate-500 hover:text-slate-800'"
                        class="px-4 py-1.5 text-xs font-semibold rounded-md transition-all">
                    {{ $role }}
                </button>
            @endforeach
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="text-slate-400 border-b border-slate-100">
                    <th class="pb-4 font-semibold">PENGGUNA</th>
                    <th class="pb-4 font-semibold">PERAN</th>
                    <th class="pb-4 font-semibold">ORGANISASI</th>
                    <th class="pb-4 font-semibold">STATUS</th>
                    <th class="pb-4 font-semibold text-right">AKSI</th>
                </tr>
            </thead>
            <tbody class="text-slate-600">
                @foreach($users as $user)
                <tr class="border-b border-slate-50 hover:bg-slate-50 transition"
                    x-show="(search === '' || '{{ strtolower($user->nama) }}'.includes(search.toLowerCase()) || '{{ strtolower($user->email) }}'.includes(search.toLowerCase())) && (roleFilter === 'Semua' || '{{ $user->role }}' === roleFilter)">
                    
                    <td class="py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs uppercase">
                                {{ substr($user->nama, 0, 1) }}
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">{{ $user->nama }}</p>
                                <p class="text-[10px] text-slate-400">{{ $user->email }}</p>
                            </div>
                        </div>
                    </td>

                    <td class="py-4">
                        <span class="px-2 py-1 rounded-md text-[10px] font-bold bg-slate-50 text-slate-600 border border-slate-100">
                            {{ $user->role }}
                        </span>
                    </td>

                    <td class="py-4 text-xs">{{ $user->mahasiswa->organisasi ?? '-' }}</td>

                    <td class="py-4">
                        <span class="flex items-center gap-1.5 text-[10px] font-bold {{ $user->status_akun == 'Aktif' ? 'text-emerald-600' : 'text-green-500' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $user->status_akun == 'Aktif' ? 'bg-emerald-500' : 'bg-green-500' }}"></span>
                            {{ $user->status_akun }}
                        </span>
                    </td>

                    <td class="py-4 text-right" x-data="{ open: false }">
                        <div class="relative">
                            <button @click="open = !open" class="text-slate-400 hover:text-slate-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" /></svg>
                            </button>
                            
                            <div x-show="open" @click.away="open = false" 
                                 class="absolute right-0 mt-2 w-48 bg-white border border-slate-100 rounded-xl shadow-lg z-20 p-2 text-left">
                                <p class="text-[9px] font-bold text-slate-400 uppercase px-3 py-1">Ubah Peran</p>
                                @foreach(['Mahasiswa', 'Pengurus', 'Admin', 'Dosen Pembimbing'] as $roleOption)
                                    <form action="{{ route('admin.pengguna.updateRole', $user->id_user) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="role" value="{{ $roleOption }}">
                                        <button type="submit" class="block w-full text-left px-3 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-50 rounded-lg">
                                            {{ $roleOption }}
                                        </button>
                                    </form>
                                @endforeach
                                <form action="{{ route('admin.pengguna.suspend', $user->id_user) }}" method="POST">
                                    @csrf @method('PUT')
                                    <button type="submit" class="block w-full text-left px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-50 rounded-lg border-t border-slate-50 mt-1">Suspend Akun</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection