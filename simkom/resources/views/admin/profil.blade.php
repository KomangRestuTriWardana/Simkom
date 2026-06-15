@extends('admin.layout.master')

@section('title', 'Profil Admin - SIMKOM')
@section('page_title', 'Profil Organisasi')

@section('content')
<div class="max-w-2xl bg-white rounded-xl border border-slate-200 shadow-sm p-6">
    <h2 class="text-sm font-bold text-slate-800 mb-6">Informasi Akun</h2>
    
    <div class="space-y-4">
        <div>
            <label class="block text-[10px] uppercase font-bold text-slate-400">Nama Lengkap</label>
            <p class="text-sm font-semibold text-slate-800">{{ Auth::user()->nama }}</p>
        </div>
        <div>
            <label class="block text-[10px] uppercase font-bold text-slate-400">Email</label>
            <p class="text-sm font-semibold text-slate-800">{{ Auth::user()->email }}</p>
        </div>
        <div>
            <label class="block text-[10px] uppercase font-bold text-slate-400">Role</label>
            <p class="text-sm font-semibold text-blue-600 capitalize">{{ Auth::user()->role }}</p>
        </div>
    </div>

    <div class="mt-8 pt-6 border-t border-slate-100">
        <button class="bg-slate-800 text-white text-xs px-4 py-2 rounded-lg font-semibold hover:bg-slate-900 transition">
            Edit Profil
        </button>
    </div>
</div>
@endsection