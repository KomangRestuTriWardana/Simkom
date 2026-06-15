@extends('admin.layout.master')

@section('title', 'Manajemen Pengguna - SIMKOM')
@section('page_title', 'Manajemen Pengguna')

@section('content')
<div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
        <h2 class="text-sm font-bold text-slate-800">Daftar Pengguna</h2>
        <button class="bg-blue-600 text-white text-xs px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
            + Tambah Pengguna
        </button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-xs text-left text-slate-600">
            <thead class="text-slate-400 bg-slate-50 uppercase">
                <tr>
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Role</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4 font-medium text-slate-900">{{ $user->nama }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-slate-100 rounded text-slate-700">{{ $user->role }}</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <button class="text-blue-600 hover:underline">Edit</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection