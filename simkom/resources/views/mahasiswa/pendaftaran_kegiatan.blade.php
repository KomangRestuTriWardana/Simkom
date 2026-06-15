@extends('mahasiswa.layout.master')
@section('page_title', 'Pendaftaran Kegiatan')

@section('content')
<div class="max-w-3xl mx-auto">
    <a href="{{ route('mahasiswa.kegiatan') }}" class="inline-flex items-center text-slate-500 hover:text-indigo-700 mb-6 font-medium text-sm">
        <span class="mr-2">←</span> Kembali ke Daftar Kegiatan
    </a>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 mb-6">
        <span class="text-xs font-semibold text-indigo-600 uppercase tracking-wider">ID Org: {{ $kegiatan->id_organisasi }}</span>
        <h2 class="text-xl font-bold text-slate-800 mt-1">{{ $kegiatan->nama_kegiatan }}</h2>
        <div class="flex items-center gap-4 mt-3 text-sm text-slate-500">
            <span class="flex items-center">📅 {{ $kegiatan->tanggal_kegiatan }}</span>
            <span class="flex items-center">📍 {{ $kegiatan->lokasi_kegiatan }}</span>
            <span class="flex items-center">👥 Kuota: {{ $kegiatan->kuota_peserta }}</span>
        </div>
    </div>

    <form action="{{ route('kegiatan.simpan') }}" method="POST">
        @csrf
        <input type="hidden" name="id_kegiatan" value="{{ $kegiatan->id_kegiatan }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
            <h3 class="text-lg font-bold text-slate-800 mb-6">Formulir Pendaftaran Peserta</h3>
            
            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">Nama Lengkap *</label>
                        <input type="text" name="nama_lengkap" required value="{{ auth()->user()->name }}" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">NIM *</label>
                        <input type="text" name="nim" required value="{{ auth()->user()->nim }}" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">NOMOR HP / WHATSAPP *</label>
                    <input type="text" name="nomor_hp" required placeholder="Contoh: 0812xxxx" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">MOTIVASI *</label>
                    <textarea name="motivasi" rows="4" required placeholder="Mengapa Anda ingin mengikuti kegiatan ini?" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition"></textarea>
                </div>

                <button type="submit" class="w-full bg-indigo-800 text-white font-bold py-3 rounded-lg hover:bg-indigo-900 transition shadow-lg hover:shadow-indigo-200">
                    Konfirmasi Pendaftaran
                </button>
            </div>
        </div>
    </form>
</div>
@endsection