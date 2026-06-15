@extends('pengurus.layout.master')

@section('page_title', 'Profil Organisasi')

@section('content')
<div class="max-w-5xl mx-auto pb-10"> <form action="#" method="POST" class="space-y-6">
        @csrf
        
        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="text-sm font-bold text-blue-900 mb-6 uppercase tracking-wider">Informasi Dasar</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Nama Organisasi</label>
                    <input type="text" name="nama" value="Himpunan Mahasiswa Informatika" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Singkatan</label>
                    <input type="text" name="singkatan" value="HMIF" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Periode Kepengurusan</label>
                    <input type="text" name="periode" value="2024/2025" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Dosen Pembimbing</label>
                    <input type="text" name="pembimbing" value="Dr. Hendra Wijaya, S.Kom., M.T." class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Email Organisasi</label>
                    <input type="email" name="email" value="hmif@student.univ.ac.id" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Nomor Kontak</label>
                    <input type="text" name="kontak" value="0812-3456-7890" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all">
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="text-sm font-bold text-blue-900 mb-6 uppercase tracking-wider">Visi & Misi</h3>
            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Visi</label>
                    <textarea name="visi" rows="3" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all resize-none"></textarea>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Misi</label>
                    <textarea name="misi" rows="5" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-sm font-semibold outline-none focus:border-blue-500 focus:bg-white transition-all resize-none"></textarea>
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
                    <p class="text-sm font-bold text-slate-700">struktur-organisasi-2024.pdf</p>
                    <p class="text-[10px] text-slate-400 uppercase">PDF atau PNG, maks. 10MB</p>
                </div>
                <button type="button" class="text-xs font-bold text-blue-600 hover:underline">Ganti File</button>
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