@extends('pengurus.layout.master')

@section('page_title', 'Manajemen Kegiatan')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <p class="text-sm text-slate-500 font-bold">{{ $kegiatans->count() }} kegiatan terdaftar</p>
        <button onclick="toggleModal('modalTambah')" class="px-4 py-2 bg-[#203184] text-white rounded-xl text-xs font-bold hover:bg-blue-800 transition-all">
            + Tambah Kegiatan
        </button>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="text-[11px] uppercase text-slate-400 font-bold border-b border-slate-100">
                    <th class="p-6">Kegiatan</th>
                    <th class="p-6">Tanggal & Lokasi</th>
                    <th class="p-6">Peserta</th>
                    <th class="p-6 text-center">Status</th>
                    <th class="p-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50 text-sm">
                @foreach($kegiatans as $item)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="p-6 font-bold text-slate-700">{{ $item->nama_kegiatan }}</td>
                    <td class="p-6 text-slate-500 text-xs">
                        <p>📅 {{ $item->tanggal_kegiatan }}</p>
                        <p class="text-slate-400 mt-1">📍 {{ $item->lokasi_kegiatan }}</p>
                    </td>
                    <td class="p-6">
                        @php
                            $peserta = 0; 
                            $kapasitas = ($item->kuota_peserta > 0) ? $item->kuota_peserta : 1;
                            $persen = min(($peserta / $kapasitas) * 100, 100);
                            $warna = ($peserta >= $kapasitas) ? '#ef4444' : '#2563eb';
                        @endphp
                        <div class="w-24 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full" style="width: {{ $persen }}%; background-color: {{ $warna }};"></div>
                        </div>
                        <p class="text-[10px] text-slate-400 mt-1">{{ $peserta }}/{{ $item->kuota_peserta }}</p>
                    </td>
                    <td class="p-6 text-center">
                        <span class="px-2 py-1 text-[10px] font-bold rounded-lg {{ $item->status_kegiatan == 'Terbuka' ? 'bg-emerald-50 text-emerald-600' : 'bg-amber-50 text-amber-600' }}">
                            ● {{ $item->status_kegiatan }}
                        </span>
                    </td>
                    <td class="p-6 text-center">
                        <div class="flex justify-center gap-2">
                            <button onclick="editModal('{{ $item->id_kegiatan }}', '{{ $item->nama_kegiatan }}', '{{ $item->tanggal_kegiatan }}', '{{ $item->kuota_peserta }}', '{{ $item->lokasi_kegiatan }}')" class="p-2 text-slate-400 hover:text-blue-600">Edit</button>
                            <form action="{{ route('pengurus.kegiatan.destroy', $item->id_kegiatan) }}" method="POST" onsubmit="return confirm('Hapus kegiatan ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 text-slate-400 hover:text-red-600">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="modalTambah" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-[100]">
    <div class="bg-white p-8 rounded-2xl w-96 shadow-2xl relative">
        <h2 class="text-lg font-bold mb-4">Tambah Kegiatan Baru</h2>
        <form action="{{ route('pengurus.kegiatan.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="nama_kegiatan" placeholder="Nama Kegiatan" class="w-full border p-2 rounded-xl" required>
            <input type="date" name="tanggal_kegiatan" class="w-full border p-2 rounded-xl" required>
            <input type="number" name="kuota_peserta" placeholder="Kapasitas" class="w-full border p-2 rounded-xl" required>
            <input type="text" name="lokasi_kegiatan" placeholder="Lokasi" class="w-full border p-2 rounded-xl" required>
            <div class="flex gap-2 mt-4">
                <button type="button" onclick="toggleModal('modalTambah')" class="flex-1 py-2 bg-gray-100 rounded-xl">Batal</button>
                <button type="submit" class="flex-1 py-2 bg-[#203184] text-white rounded-xl">Tambahkan</button>
            </div>
        </form>
    </div>
</div>

<div id="modalEdit" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-[100]">
    <div class="bg-white p-8 rounded-2xl w-96 shadow-2xl relative">
        <h2 class="text-lg font-bold mb-4">Edit Kegiatan</h2>
        <form id="formEdit" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <input type="text" name="nama_kegiatan" id="editNama" class="w-full border p-2 rounded-xl" required>
            <input type="date" name="tanggal_kegiatan" id="editTgl" class="w-full border p-2 rounded-xl" required>
            <input type="number" name="kuota_peserta" id="editKuota" class="w-full border p-2 rounded-xl" required>
            <input type="text" name="lokasi_kegiatan" id="editLokasi" class="w-full border p-2 rounded-xl" required>
            <div class="flex gap-2 mt-4">
                <button type="button" onclick="toggleModal('modalEdit')" class="flex-1 py-2 bg-gray-100 rounded-xl">Batal</button>
                <button type="submit" class="flex-1 py-2 bg-[#203184] text-white rounded-xl">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal(id) {
        const modal = document.getElementById(id);
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }
    function editModal(id, nama, tgl, kuota, lokasi) {
        document.getElementById('formEdit').action = "/pengurus/kegiatan/" + id;
        document.getElementById('editNama').value = nama;
        document.getElementById('editTgl').value = tgl;
        document.getElementById('editKuota').value = kuota;
        document.getElementById('editLokasi').value = lokasi;
        toggleModal('modalEdit');
    }
</script>
@endsection