<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
  public function run(): void
{
    \App\Models\Kegiatan::insert([
        [
            'id_organisasi' => 1,
            'nama_kegiatan' => 'Leadership Development Camp (LDK) 2025',
            'deskripsi_kegiatan' => 'Pelatihan kepemimpinan intensif untuk membentuk karakter mahasiswa yang tangguh dan visioner.',
            'tanggal_kegiatan' => '2025-08-15',
            'lokasi_kegiatan' => 'Cisarua, Bogor',
            'kuota_peserta' => 50,
            'status_kegiatan' => 'Terbuka'
        ],
        [
            'id_organisasi' => 2,
            'nama_kegiatan' => 'Seminar Nasional Teknologi Informasi',
            'deskripsi_kegiatan' => 'Diskusi mendalam mengenai tren teknologi AI dan dampaknya bagi masa depan industri digital.',
            'tanggal_kegiatan' => '2025-08-22',
            'lokasi_kegiatan' => 'Aula Utama Kampus',
            'kuota_peserta' => 200,
            'status_kegiatan' => 'Terbuka'
        ],
        [
            'id_organisasi' => 3,
            'nama_kegiatan' => 'Workshop UI/UX Design for Beginners',
            'deskripsi_kegiatan' => 'Belajar dasar-dasar desain antarmuka dan pengalaman pengguna menggunakan tools industri.',
            'tanggal_kegiatan' => '2025-08-28',
            'lokasi_kegiatan' => 'Lab Komputer Gedung B',
            'kuota_peserta' => 30,
            'status_kegiatan' => 'Terbuka'
        ],
        [
            'id_organisasi' => 4,
            'nama_kegiatan' => 'Turnamen Futsal Mahasiswa Antar Jurusan',
            'deskripsi_kegiatan' => 'Ajang kompetisi olahraga untuk mempererat tali persaudaraan antar jurusan di kampus.',
            'tanggal_kegiatan' => '2025-09-05',
            'lokasi_kegiatan' => 'Lapangan Olahraga Kampus',
            'kuota_peserta' => 10,
            'status_kegiatan' => 'Penuh'
        ],
        [
            'id_organisasi' => 5,
            'nama_kegiatan' => 'Pentas Seni & Budaya Akhir Semester',
            'deskripsi_kegiatan' => 'Perayaan akhir semester yang menampilkan berbagai bakat seni dan budaya dari mahasiswa.',
            'tanggal_kegiatan' => '2025-09-12',
            'lokasi_kegiatan' => 'Auditorium Kampus',
            'kuota_peserta' => 500,
            'status_kegiatan' => 'Terbuka'
        ],
        [
            'id_organisasi' => 1,
            'nama_kegiatan' => 'Pelatihan Public Speaking & MC Profesional',
            'deskripsi_kegiatan' => 'Meningkatkan rasa percaya diri dan teknik berbicara di depan umum secara profesional.',
            'tanggal_kegiatan' => '2025-09-19',
            'lokasi_kegiatan' => 'Ruang Seminar Lantai 3',
            'kuota_peserta' => 40,
            'status_kegiatan' => 'Terbuka'
        ]
    ]);
}
}
