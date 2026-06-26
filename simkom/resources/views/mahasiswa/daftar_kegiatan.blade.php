@extends('mahasiswa.layout.master')
@section('page_title', 'Pendaftaran Kegiatan')

@section('content')
<div class="max-w-7xl mx-auto">

    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 mb-10 flex items-center justify-between gap-6">
        <div class="relative flex-grow max-w-xl">
            <input type="text" id="searchInput" placeholder="Cari kegiatan..." 
                   class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-indigo-400 transition text-sm">
            <span class="absolute left-4 top-3.5 text-slate-400 text-lg"></span>
        </div>
        <div class="flex items-center gap-2 overflow-x-auto pb-1">
            <button onclick="filterKegiatan('Semua', this)" class="filter-btn px-5 py-2.5 bg-indigo-600 text-white rounded-full text-xs font-semibold whitespace-nowrap active-filter transition">Semua</button>
            <button onclick="filterKegiatan('Terbuka', this)" class="filter-btn px-5 py-2.5 bg-slate-100 text-slate-600 rounded-full text-xs font-medium whitespace-nowrap hover:bg-slate-200 transition">Terbuka</button>
            <button onclick="filterKegiatan('Penuh', this)" class="filter-btn px-5 py-2.5 bg-slate-100 text-slate-600 rounded-full text-xs font-medium whitespace-nowrap hover:bg-slate-200 transition">Penuh</button>
        </div>
    </div>

    <div id="kegiatanContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($kegiatans as $kegiatan)
            <div class="kegiatan-card bg-white p-7 rounded-3xl shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col relative overflow-hidden" data-status="{{ $kegiatan->status_kegiatan }}">
                
                <div class="absolute top-0 left-0 w-full h-1.5 {{ $kegiatan->status_kegiatan == 'Penuh' ? 'bg-red-500' : 'bg-blue-600' }}"></div>

                <div class="flex justify-between items-center mb-5 mt-2">
                    <span class="text-xs font-medium text-slate-400 uppercase">Org ID: {{ $kegiatan->id_organisasi }}</span>
                    <span class="px-3 py-1.5 text-[11px] font-bold rounded-full flex items-center gap-1.5 {{ $kegiatan->status_kegiatan == 'Penuh' ? 'bg-red-50 text-red-700' : 'bg-blue-50 text-blue-700' }}">
                        <span class="w-2 h-2 rounded-full {{ $kegiatan->status_kegiatan == 'Penuh' ? 'bg-red-500' : 'bg-blue-600' }}"></span>
                        {{ $kegiatan->status_kegiatan }}
                    </span>
                </div>

                <h3 class="kegiatan-title text-xl font-bold text-slate-800 flex-grow leading-tight">{{ $kegiatan->nama_kegiatan }}</h3>
                
                <div class="text-sm text-slate-600 mt-4 space-y-2 border-t border-slate-100 pt-4">
                    <p>📅 {{ $kegiatan->tanggal_kegiatan }}</p>
                    <p>📍 {{ $kegiatan->lokasi_kegiatan }}</p>
                </div>

                <div class="mt-6 bg-slate-50 p-4 rounded-xl">
                    <div class="flex justify-between text-xs font-semibold text-slate-600 mb-2">
                        <span>Sisa Kuota</span>
                        <span class="{{ $kegiatan->status_kegiatan == 'Penuh' ? 'text-red-600' : 'text-blue-700' }}">
                            {{ $kegiatan->status_kegiatan == 'Penuh' ? 'HABIS' : $kegiatan->kuota_peserta . ' slot' }}
                        </span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2">
                        <div class="h-2 rounded-full {{ $kegiatan->status_kegiatan == 'Penuh' ? 'bg-red-500' : 'bg-blue-600' }}" style="width: {{ $kegiatan->status_kegiatan == 'Penuh' ? '100' : '70' }}%"></div>
                    </div>
                </div>

                <a href="{{ route('kegiatan.daftar', $kegiatan->id_kegiatan) }}" 
                   class="mt-6 block text-center py-3 rounded-xl font-semibold text-sm transition {{ $kegiatan->status_kegiatan == 'Penuh' ? 'bg-slate-100 text-slate-400 cursor-not-allowed' : 'bg-indigo-700 text-white hover:bg-indigo-800' }}">
                    {{ $kegiatan->status_kegiatan == 'Penuh' ? 'Kuota Penuh' : 'Daftar Sekarang' }}
                </a>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let input = this.value.toLowerCase();
        document.querySelectorAll('.kegiatan-card').forEach(card => {
            let title = card.querySelector('.kegiatan-title').innerText.toLowerCase();
            card.style.display = title.includes(input) ? '' : 'none';
        });
    });

    function filterKegiatan(status, btn) {
        document.querySelectorAll('.filter-btn').forEach(b => {
            b.classList.remove('bg-indigo-600', 'text-white', 'font-semibold');
            b.classList.add('bg-slate-100', 'text-slate-600', 'font-medium');
        });
        btn.classList.remove('bg-slate-100', 'text-slate-600', 'font-medium');
        btn.classList.add('bg-indigo-600', 'text-white', 'font-semibold');

        document.querySelectorAll('.kegiatan-card').forEach(card => {
            card.style.display = (status === 'Semua' || card.getAttribute('data-status') === status) ? '' : 'none';
        });
    }
</script>
@endsection