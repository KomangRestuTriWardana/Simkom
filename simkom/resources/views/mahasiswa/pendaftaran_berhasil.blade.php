@extends('mahasiswa.layout.master')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="text-center p-5" style="width: 100%; max-width: 600px; margin: 0 auto;">
        
        <div style="display: flex; justify-content: center; margin-bottom: 24px;">
            <div style="width: 96px; height: 96px; background-color: #d1fae5; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <svg style="width: 48px; height: 48px; color: #10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>

        <h2 class="fw-bold">Pendaftaran Berhasil!</h2>
        <p class="text-muted">Anda telah berhasil mendaftar untuk kegiatan:</p>
        
        <div class="my-4">
            <h4 class="fw-bold">{{ session('nama_kegiatan') ?? 'Nama Kegiatan Tidak Ditemukan' }}</h4>
            <p class="text-muted">
                {{ session('tanggal') ?? 'Tanggal' }}
            </p>
        </div>

        <p class="text-muted">Konfirmasi akan dikirimkan ke email kampus Anda.</p>     

        <a href="{{ route('mahasiswa.kegiatan') }}" class="inline-block mt-8 px-6 py-3 bg-[#203184] text-white font-bold rounded-lg hover:bg-blue-900 transition shadow-lg text-decoration-none">
            Kembali ke Pendaftaran
        </a>
    </div>
</div>
@endsection