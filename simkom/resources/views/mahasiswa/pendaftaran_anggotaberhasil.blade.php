@extends('mahasiswa.layout.master')
@section('page_title', 'Pendaftaran Berhasil')

@section('content')
<div class="flex flex-col items-center justify-center py-20 text-center" style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 70vh;">
    
    <div class="bg-green-100 p-4 rounded-full mb-6" style="background-color: #d1fae5; padding: 16px; border-radius: 50%; margin-bottom: 24px; display: flex; align-items: center; justify-content: center; width: 96px; height: 96px;">
        <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 48px; height: 48px; color: #10b981;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
    </div>

    <h2 class="text-2xl font-bold text-green-600 mb-2" style="color: #059669; font-weight: bold; font-size: 1.5rem; margin-bottom: 8px;">Formulir Terkirim!</h2>

    <p class="text-slate-500 max-w-md mb-8" style="color: #64748b; max-width: 500px; margin-bottom: 32px; line-height: 1.6;">
        Pengajuan keanggotaan Anda untuk 
        <strong>
            {{ session('nama_organisasi') ?? 'Organisasi Pilihan' }} 
            @if(session('singkatan'))
                ({{ session('singkatan') }})
            @endif
        </strong> 
        telah berhasil dikirim. Tim pengurus akan meninjau dan menghubungi Anda dalam 3–5 hari kerja.
    </p>

    <a href="{{ route('mahasiswa.anggota') }}" class="px-6 py-3 bg-[#203184] text-white font-bold rounded-lg hover:bg-blue-900 transition shadow-lg" style="text-decoration: none;">
        Ajukan ke Organisasi Lain
    </a>
</div>
@endsection