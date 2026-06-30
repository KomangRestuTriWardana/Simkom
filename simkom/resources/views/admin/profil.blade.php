@extends('admin.layout.master')
@section('title', 'Profil Organisasi')

@section('content')
<div x-data="{ 
    search: '', 
    showModal: false, 
    showAddModal: false,
    editForm: { id: '', nama: '', singkatan: '', periode: '', pembimbing: '', status: '' },
    openEdit(org) {
        this.editForm = { id: org.id_organisasi, nama: org.nama_organisasi, singkatan: org.singkatan, periode: org.periode_kepengurusan, pembimbing: org.dosen_pembimbing, status: org.status };
        this.showModal = true;
    }
}">
    
    {{-- Header: Pencarian & Tambah --}}
    <div class="flex justify-between items-center mb-6">
        <div class="relative w-full max-w-sm">
            <input type="text" x-model="search" placeholder="Cari organisasi..." 
                   class="w-full pl-4 pr-4 py-2 text-sm border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#203184]/20 transition">
        </div>
        <button @click="showAddModal = true" class="bg-[#203184] text-white px-4 py-2 rounded-xl text-xs font-bold flex items-center gap-2 whitespace-nowrap ml-4">
            + Tambah Organisasi
        </button>
    </div>

    {{-- Grid Card --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($organisasis as $org)
        <div x-show="search === '' || '{{ strtolower($org->nama_organisasi) }}'.includes(search.toLowerCase())"
             class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm transition relative overflow-hidden {{ $org->status == 'Aktif' ? 'border-t-4 border-t-[#203184]' : '' }}">
            
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center font-bold text-blue-600 text-lg">
                    {{ substr($org->singkatan, 0, 2) }}
                </div>
                
                <form action="{{ route('admin.profil.update-status', $org->id_organisasi) }}" method="POST">
                    @csrf @method('PATCH')
                    <input type="hidden" name="status" value="{{ $org->status == 'Aktif' ? 'Nonaktif' : 'Aktif' }}">
                    <button type="submit" class="text-[10px] font-bold px-3 py-1 rounded-full transition {{ $org->status == 'Aktif' ? 'bg-emerald-50 text-emerald-600' : 'bg-red-50 text-red-500' }}">
                        {{ $org->status }}
                    </button>
                </form>
            </div>

            <h3 class="font-bold text-slate-800 leading-tight mb-1">{{ $org->nama_organisasi }}</h3>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mb-6">{{ $org->singkatan }} · {{ $org->periode_kepengurusan }}</p>

            <div class="pt-4 border-t border-slate-100">
                <p class="text-[9px] text-slate-400 font-bold uppercase">Pembimbing</p>
                <p class="text-xs font-semibold text-slate-600 mb-6">{{ $org->dosen_pembimbing }}</p>
                
                <div class="flex gap-2">
                    <button @click="openEdit({{ json_encode($org) }})" class="flex-1 py-2 text-xs font-bold text-slate-600 border border-slate-200 rounded-lg hover:bg-slate-50 transition">Edit</button>
                    <form action="{{ route('admin.profil.delete', $org->id_organisasi) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus organisasi ini?')">
                          @csrf @method('DELETE')
                        <button type="submit" class="w-10 flex items-center justify-center border border-red-100 text-red-500 rounded-lg hover:bg-red-50 transition">🗑️</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Modal Edit --}}
    <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4" x-cloak>
        <div class="bg-white rounded-2xl p-6 w-full max-w-lg shadow-xl" @click.away="showModal = false">
            <h3 class="font-bold text-slate-800 mb-4">Edit — <span x-text="editForm.nama"></span></h3>
            <form action="{{ route('admin.profil.update', 0) }}" method="POST">
                @csrf @method('PUT')
                <input type="hidden" name="id" x-model="editForm.id">
                <div class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1">Nama Organisasi</label>
                        <input type="text" name="nama_organisasi" x-model="editForm.nama" class="w-full border border-slate-200 p-2.5 rounded-lg text-sm">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1">Singkatan</label>
                            <input type="text" name="singkatan" x-model="editForm.singkatan" class="w-full border border-slate-200 p-2.5 rounded-lg text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1">Periode</label>
                            <input type="text" name="periode_kepengurusan" x-model="editForm.periode" class="w-full border border-slate-200 p-2.5 rounded-lg text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1">Dosen Pembimbing</label>
                        <input type="text" name="dosen_pembimbing" x-model="editForm.pembimbing" class="w-full border border-slate-200 p-2.5 rounded-lg text-sm">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1">Status Organisasi</label>
                        <select name="status" x-model="editForm.status" class="w-full border border-slate-200 p-2.5 rounded-lg text-sm">
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" @click="showModal = false" class="px-4 py-2 text-sm font-bold text-slate-600 bg-slate-100 rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-[#203184] text-white text-sm font-bold rounded-lg">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div x-show="showAddModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4" x-cloak>
        <div class="bg-white rounded-2xl p-6 w-full max-w-lg shadow-xl" @click.away="showAddModal = false">
            <h3 class="font-bold text-slate-800 mb-4">Tambah Organisasi Baru</h3>
            <form action="{{ route('admin.profil.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1">Nama Organisasi</label>
                        <input type="text" name="nama_organisasi" required class="w-full border border-slate-200 p-2.5 rounded-lg text-sm">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1">Singkatan</label>
                            <input type="text" name="singkatan" required class="w-full border border-slate-200 p-2.5 rounded-lg text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1">Periode</label>
                            <input type="text" name="periode_kepengurusan" placeholder="2025/2026" class="w-full border border-slate-200 p-2.5 rounded-lg text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1">Dosen Pembimbing</label>
                        <input type="text" name="dosen_pembimbing" class="w-full border border-slate-200 p-2.5 rounded-lg text-sm">
                    </div>
                </div>
                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" @click="showAddModal = false" class="px-4 py-2 text-sm font-bold text-slate-600 bg-slate-100 rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-[#203184] text-white text-sm font-bold rounded-lg">Daftarkan Organisasi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection