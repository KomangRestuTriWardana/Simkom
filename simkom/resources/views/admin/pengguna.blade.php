@extends('admin.layout.master')
@section('page_title', 'Manajemen Pengguna')

@section('content')
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h2 class="font-bold text-slate-800 text-lg">Manajemen Pengguna</h2>
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
                <tr class="border-b border-slate-50 last:border-0 hover:bg-slate-50 transition">
                    <!-- Pengguna Column -->
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

                    <!-- Peran Column dengan Warna Dinamis -->
                    <td class="py-4">
                        @php
                            $roleColors = [
                                'Mahasiswa' => 'bg-blue-50 text-blue-600',
                                'Pengurus' => 'bg-emerald-50 text-emerald-600',
                                'Admin' => 'bg-purple-50 text-purple-600',
                                'Dosen Pembimbing' => 'bg-amber-50 text-amber-600'
                            ];
                        @endphp
                        <span class="px-2 py-1 rounded-md text-[10px] font-bold {{ $roleColors[$user->role] ?? 'bg-slate-100 text-slate-600' }}">
                            {{ $user->role }}
                        </span>
                    </td>

                    <!-- Organisasi Column -->
                    <td class="py-4 text-xs">
                        {{ $user->mahasiswa->organisasi ?? '-' }}
                    </td>

                    <!-- Status Column -->
                    <td class="py-4">
                        <span class="flex items-center gap-1.5 text-[10px] font-bold {{ $user->status_akun == 'Aktif' ? 'text-emerald-600' : 'text-green-600' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $user->status_akun == 'Aktif' ? 'bg-emerald-500' : 'bg-green-500' }}"></span>
                            {{ $user->status_akun }}
                        </span>
                    </td>

                    <!-- Aksi Dropdown Alpine.js -->
                    <td class="py-4 text-right" x-data="{ open: false }">
                        <div class="relative">
                            <button @click="open = !open" class="text-slate-400 hover:text-slate-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" /></svg>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div x-show="open" @click.away="open = false" 
                                 class="absolute right-0 mt-2 w-48 bg-white border border-slate-100 rounded-xl shadow-lg z-10 p-2">
                                <button class="block w-full text-left px-3 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-50 rounded-lg">Ubah Peran</button>
                                <button class="block w-full text-left px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-50 rounded-lg border-t border-slate-50 mt-1">Suspend Akun</button>
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