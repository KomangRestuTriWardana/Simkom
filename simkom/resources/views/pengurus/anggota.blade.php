@extends('pengurus.layout.master')

@section('page_title', 'Manajemen Anggota')

@section('content')
<div class="space-y-6" x-data="{ openModal: false, selectedAnggota: {} }">
    
    <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between">
        <div class="relative w-full max-w-lg">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
            <input type="text" placeholder="Cari nama atau NIM..." class="w-full bg-slate-50 border border-slate-100 rounded-xl pl-10 pr-4 py-2.5 text-sm outline-none focus:border-blue-500 transition-all">
        </div>
        <div class="flex gap-2">
            <a href="{{ route('pengurus.anggota') }}" class="px-4 py-2 text-xs font-semibold rounded-lg transition-all {{ is_null(request('status')) ? 'bg-[#203184] text-white' : 'bg-slate-50 text-slate-600 hover:bg-slate-100' }}">Semua</a>
            <a href="{{ route('pengurus.anggota', ['status' => 'Pending']) }}" class="px-4 py-2 text-xs font-semibold rounded-lg transition-all {{ request('status') == 'Pending' ? 'bg-[#203184] text-white' : 'bg-slate-50 text-slate-600 hover:bg-slate-100' }}">Menunggu</a>
            <a href="{{ route('pengurus.anggota', ['status' => 'Aktif']) }}" class="px-4 py-2 text-xs font-semibold rounded-lg transition-all {{ request('status') == 'Aktif' ? 'bg-[#203184] text-white' : 'bg-slate-50 text-slate-600 hover:bg-slate-100' }}">Diterima</a>
            <a href="{{ route('pengurus.anggota', ['status' => 'NonAktif']) }}" class="px-4 py-2 text-xs font-semibold rounded-lg transition-all {{ request('status') == 'NonAktif' ? 'bg-[#203184] text-white' : 'bg-slate-50 text-slate-600 hover:bg-slate-100' }}">Ditolak</a>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="text-[11px] uppercase text-slate-400 font-bold border-b border-slate-100">
                    <th class="p-5">Pendaftar</th>
                    <th class="p-5">Prodi</th>
                    <th class="p-5">Tanggal Daftar</th>
                    <th class="p-5">Status</th>
                    <th class="p-5">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50 text-sm">
                @foreach($anggotas as $item)
                <tr class="hover:bg-slate-50 transition-all">
                    <td class="p-5 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">{{ substr($item->nama_anggota, 0, 1) }}</div>
                        <div>
                            <p class="font-bold text-slate-700">{{ $item->nama_anggota }}</p>
                            <p class="text-[10px] text-slate-400">{{ $item->nim_anggota }}</p>
                        </div>
                    </td>
                    <td class="p-5 text-slate-500">{{ $item->program_studi }}</td>
                    <td class="p-5 text-slate-500">{{ $item->tanggal_bergabung }}</td> 
                    <td class="p-5">
                        <span class="px-2.5 py-1 text-[10px] font-bold rounded-full {{ $item->status_anggota == 'Pending' ? 'bg-amber-50 text-amber-600' : ($item->status_anggota == 'Aktif' ? 'bg-emerald-50 text-emerald-600' : 'bg-red-50 text-red-600') }}">
                            ● {{ $item->status_anggota }}
                        </span>
                    </td>
                    <td class="p-5 flex items-center gap-2">
                        @if($item->status_anggota == 'Pending')
                            <form action="{{ route('pengurus.anggota.update', $item->id_anggota) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="Aktif">
                                <button type="submit" class="px-3 py-1.5 bg-emerald-50 text-emerald-600 border border-emerald-200 rounded-lg text-[10px] font-bold hover:bg-emerald-100 transition-all">✓ Terima</button>
                            </form>
                            <form action="{{ route('pengurus.anggota.update', $item->id_anggota) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="NonAktif">
                                <button type="submit" class="px-3 py-1.5 bg-red-50 text-red-600 border border-red-200 rounded-lg text-[10px] font-bold hover:bg-red-100 transition-all">× Tolak</button>
                            </form>
                        @endif
                        <button type="button" 
                                @click="openModal = true; selectedAnggota = {{ json_encode($item) }}" 
                                class="px-3 py-1.5 bg-slate-50 text-slate-600 border border-slate-200 rounded-lg text-[10px] font-bold hover:bg-slate-100 transition-all flex items-center gap-1">
                            👁 Lihat Dokumen
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div x-show="openModal" 
         class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-900/50 backdrop-blur-sm p-4"
         x-cloak>
        <div @click.away="openModal = false" class="bg-white w-full max-w-4xl rounded-3xl shadow-2xl flex overflow-hidden h-[600px] relative">
            
            <div class="w-1/3 p-8 border-r border-slate-100 flex flex-col items-center text-center">
                <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold text-3xl mb-4" x-text="selectedAnggota.nama_anggota ? selectedAnggota.nama_anggota.charAt(0).toUpperCase() : ''"></div>
                <h3 class="font-bold text-lg text-slate-800" x-text="selectedAnggota.nama_anggota"></h3>
                <p class="text-xs text-slate-400 mb-6" x-text="selectedAnggota.nim_anggota"></p>
                <div class="w-full text-left space-y-4 text-sm text-slate-600">
                    <div><p class="text-[10px] text-slate-400 uppercase font-bold">Program Studi</p><p x-text="selectedAnggota.program_studi"></p></div>
                    <div><p class="text-[10px] text-slate-400 uppercase font-bold">Tanggal Daftar</p><p x-text="selectedAnggota.tanggal_bergabung"></p></div>
                    <div><p class="text-[10px] text-slate-400 uppercase font-bold">Nomor HP</p><p x-text="selectedAnggota.nomor_hp"></p></div>
                </div>
            </div>

            <div class="w-2/3 flex flex-col relative">
                <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                    <h4 class="font-bold text-slate-800">Pratinjau Dokumen</h4>
                    <button type="button" @click="openModal = false" class="p-2 text-slate-400 hover:text-red-500 rounded-full cursor-pointer z-[9999]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                
                <div class="flex-1 flex flex-col items-center justify-center bg-slate-50 p-12 text-center">
                    <div class="p-4 bg-white rounded-xl shadow-sm border border-slate-100 mb-4">📄</div>
                    <p class="font-bold text-slate-700" x-text="selectedAnggota.dokumen_pendukung"></p>
                    <p class="text-sm text-slate-500 mb-6">Preview PDF tidak tersedia di browser.</p>
                    <a :href="'/storage/dokumen/' + selectedAnggota.dokumen_pendukung" target="_blank" class="px-6 py-3 bg-[#203184] text-white rounded-xl text-sm font-bold flex items-center gap-2 hover:bg-[#1a2870]">⬇ Unduh Dokumen</a>
                </div>

                <div class="p-4 border-t border-slate-100 bg-white flex justify-between items-center">
                    <div>
                        <template x-if="selectedAnggota.status_anggota == 'Aktif'">
                            <form :action="'{{ route('pengurus.anggota.update', ['id' => 'TARGET_ID']) }}'.replace('TARGET_ID', selectedAnggota.id_anggota)" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="NonAktif">
                                <button type="submit" class="px-4 py-2 bg-red-50 text-red-600 border border-red-100 rounded-xl text-xs font-bold hover:bg-red-100 transition-all flex items-center gap-1">
                                    Nonaktifkan Anggota
                                </button>
                            </form>
                        </template>

                        <template x-if="selectedAnggota.status_anggota == 'NonAktif'">
                            <form :action="'{{ route('pengurus.anggota.update', ['id' => 'TARGET_ID']) }}'.replace('TARGET_ID', selectedAnggota.id_anggota)" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="Aktif">
                                <button type="submit" class="px-4 py-2 bg-emerald-50 text-emerald-600 border border-emerald-100 rounded-xl text-xs font-bold hover:bg-emerald-100 transition-all flex items-center gap-1">
                                    Aktifkan Kembali Anggota
                                </button>
                            </form>
                        </template>
                    </div>

                    <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                        Status: <span x-text="selectedAnggota.status_anggota" :class="selectedAnggota.status_anggota == 'Pending' ? 'text-amber-500' : (selectedAnggota.status_anggota == 'Aktif' ? 'text-emerald-500' : 'text-red-500')"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div> 
@endsection