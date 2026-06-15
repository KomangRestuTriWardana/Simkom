@extends('mahasiswa.layout.master')
@section('page_title', 'Pendaftaran Anggota')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
        <h2 class="text-2xl font-bold text-slate-800">Formulir Pendaftaran Anggota</h2>
        <p class="text-slate-500 mb-8">Isi data diri Anda dengan lengkap dan benar</p>
        
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                <ul class="text-sm text-red-600 list-disc ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">
                
                <div>
                    <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">Organisasi yang dituju *</label>
                    <select name="id_organisasi" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none" required>
                        <option value="" disabled selected>-- Pilih Organisasi --</option>
                        <option value="1">Himpunan Mahasiswa Informatika (HMIF)</option>
                        <option value="2">BEM Universitas Nusantara</option>
                        <option value="3">Unit Kegiatan Mahasiswa Seni</option>
                        <option value="4">Unit Kegiatan Olahraga</option>
                        <option value="5">Paduan Suara Mahasiswa</option>
                        <option value="6">Komunitas Developer Kampus</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">Nama Lengkap *</label>
                        <input type="text" name="nama_anggota" value="{{ auth()->user()->nama }}" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none" required>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">NIM *</label>
                        <input type="text" name="nim_anggota" value="{{ auth()->user()->nim }}" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">Program Studi *</label>
                        <select name="program_studi" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none" required>
                            <option value="" disabled selected>-- Pilih Prodi --</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                            <option value="Hukum">Hukum</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">Angkatan *</label>
                        <input type="text" name="angkatan" placeholder="Contoh: 2023" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none" required>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">Nomor HP / WhatsApp *</label>
                    <input type="text" name="nomor_hp" placeholder="08xx-xxxx-xxxx" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">Alamat Lengkap *</label>
                    <textarea name="alamat" rows="3" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none" required></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">Motivasi Bergabung *</label>
                    <textarea name="motivasi" rows="3" placeholder="Ceritakan alasan Anda ingin bergabung..." class="w-full px-4 py-3 border border-slate-200 rounded-lg outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">Dokumen Pendukung (PDF/JPG) *</label>
                    <div class="border-2 border-dashed border-slate-200 rounded-lg p-6 text-center hover:border-indigo-500 transition">
                        <input type="file" name="dokumen_pendukung" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
                    </div>
                </div>

                <div class="bg-slate-50 p-4 rounded-lg border border-slate-100">
                    <p class="text-xs text-slate-500">Data Anda akan digunakan untuk proses seleksi anggota. Pengurus berhak menyetujui atau menolak pengajuan berdasarkan pertimbangan organisasi.</p>
                </div>

                <button type="submit" class="w-full bg-[#203184] text-white font-bold py-4 rounded-lg hover:bg-blue-900 transition shadow-lg">
                    Kirim Formulir Pendaftaran
                </button>
            </div>
        </form>
    </div>
</div>
@endsection