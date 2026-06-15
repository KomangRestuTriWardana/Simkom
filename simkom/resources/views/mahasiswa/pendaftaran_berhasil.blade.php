@extends('mahasiswa.layout.master')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="text-center p-5">
        <div class="mb-4">
            <i class="fas fa-check-circle text-success" style="font-size: 80px;"></i>
        </div>

        <h2 class="fw-bold">Pendaftaran Berhasil!</h2>
        <p class="text-muted">Anda telah berhasil mendaftar untuk kegiatan:</p>
        
        <div class="my-4">
            <h4 class="fw-bold">{{ $nama_kegiatan ?? 'Nama Kegiatan' }}</h4>
            <p class="text-muted">
                {{ $penyelenggara ?? 'Penyelenggara' }} · {{ $tanggal ?? 'Tanggal' }}
            </p>
        </div>

        <p class="text-muted">Konfirmasi akan dikirimkan ke email kampus Anda.</p>

        <a href="{{ route('mahasiswa.kegiatan') }}" class="btn btn-primary mt-3 px-4 py-2">
            Kembali ke Pendaftaran
        </a>
    </div>
</div>
@endsection