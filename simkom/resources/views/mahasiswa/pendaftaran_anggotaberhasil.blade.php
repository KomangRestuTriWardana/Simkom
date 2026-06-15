@extends('mahasiswa.layout.master')
@section('page_title', 'Pendaftaran Berhasil')

@section('content')
<div class="flex flex-col items-center justify-center py-20 text-center">
    <div class="bg-green-100 p-4 rounded-full mb-6">
        <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
    </div>

    <h2 class="text-2xl font-bold text-green-600 mb-2">Formulir Terkirim!</h2>

<p class="text-slate-500 max-w-md mb-8">
    Pengajuan keanggotaan Anda untuk <strong>Himpunan Mahasiswa Informatika (HMIF)</strong> telah berhasil dikirim. 
    Tim pengurus akan meninjau dan menghubungi Anda dalam 3–5 hari kerja.
</p>

<a href="{{ route('mahasiswa.anggota') }}" class="px-6 py-3 bg-[#203184] text-white font-bold rounded-lg hover:bg-blue-900 transition shadow-lg">
    Ajukan ke Organisasi Lain
</a>
</div>
@endsection