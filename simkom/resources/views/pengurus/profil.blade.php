@extends('pengurus.layout.master')

@section('page_title', 'Profil Organisasi')

@section('content')
<div class="max-w-5xl mx-auto pb-10"> 
    
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-xl font-semibold text-sm">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('pengurus.profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="text-sm font-bold text-blue-900 mb-6 uppercase tracking-wider">Informasi Dasar</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Nama Organisasi</label>
                    <input type="text" name="nama_organisasi" value="{{ old('nama_organisasi', $organisasi->nama_organisasi) }}" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all">
                </div>
                
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Singkatan</label>
                    <input type="text" name="singkatan" value="{{ old('singkatan', $organisasi->singkatan) }}" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all">
                </div>
                
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Periode Kepengurusan</label>
                    <input type="text" name="periode_kepengurusan" value="{{ old('periode_kepengurusan', $organisasi->periode_kepengurusan) }}" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all">
                </div>
                
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Dosen Pembimbing</label>
                    <input type="text" name="dosen_pembimbing" value="{{ old('dosen_pembimbing', $organisasi->dosen_pembimbing) }}" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all">
                </div>
                
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Email Organisasi</label>
                    <input type="email" name="email_organisasi" value="{{ old('email_organisasi', $organisasi->email_organisasi) }}" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all">
                </div>
                
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Nomor Kontak</label>
                    <input type="text" name="nomor_kontak" value="{{ old('nomor_kontak', $organisasi->nomor_kontak) }}" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all">
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="text-sm font-bold text-blue-900 mb-6 uppercase tracking-wider">Visi & Misi</h3>
            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Visi</label>
                    <textarea name="visi" rows="3" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all resize-none">{{ old('visi', $organisasi->visi) }}</textarea>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Misi</label>
                    <textarea name="misi" rows="5" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all resize-none">{{ old('misi', $organisasi->misi) }}</textarea>
                    <p class="text-[10px] text-slate-400 italic">Pisahkan setiap poin misi dengan baris baru.</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="text-sm font-bold text-blue-900 mb-6 uppercase tracking-wider">Struktur Organisasi</h3>
            <div class="border-2 border-dashed border-slate-100 rounded-2xl p-8 flex flex-col items-center justify-center space-y-4">
                <div class="w-12 h-12 bg-slate-50 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                </div>
                <div class="text-center">
                    <p class="text-sm font-bold text-slate-700">{{ $organisasi->struktur_organisasi ?? 'Belum ada file diupload' }}</p>
                    <p class="text-[10px] text-slate-400 uppercase">PDF atau Gambar, maks. 10MB</p>
                </div>
                <input type="file" name="struktur_organisasi" class="text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </div>
        </div>

        <div class="sticky bottom-0 bg-[#F8FAFC]/95 backdrop-blur-sm py-4 border-t border-slate-100 flex justify-end">
            <button type="submit" class="bg-[#203184] text-white px-8 py-3 rounded-xl font-bold shadow-lg hover:bg-blue-800 transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                </svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection