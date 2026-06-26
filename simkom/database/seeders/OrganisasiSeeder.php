<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organisasis')->insert([
            [
                'id_organisasi' => 1,
                'nama_organisasi' => 'Himpunan Mahasiswa Informatika',
                'singkatan' => 'HMIF',
                'periode_kepengurusan' => '2026/2027',
                'dosen_pembimbing' => 'Dr. Eko Prasetyo, M.T.',
                'email_organisasi' => 'hmif@campus.ac.id',
                'nomor_kontak' => '081234567890',
                'visi' => 'Menjadi himpunan yang inovatif dan unggul dalam teknologi.',
                'misi' => 'Mengembangkan potensi akademik dan kreativitas mahasiswa.',
                'struktur_organisasi' => 'struktur_hmif.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_organisasi' => 2,
                'nama_organisasi' => 'BEM Universitas Nusantara',
                'singkatan' => 'BEM UN',
                'periode_kepengurusan' => '2026/2027',
                'dosen_pembimbing' => 'Budi Santoso, M.Si.',
                'email_organisasi' => 'bem@campus.ac.id',
                'nomor_kontak' => '081234567891',
                'visi' => 'Mewujudkan komitmen sinergi nyata bagi seluruh mahasiswa.',
                'misi' => 'Menampung aspirasi dan membangun relasi internal eksternal.',
                'struktur_organisasi' => 'struktur_bem.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_organisasi' => 3,
                'nama_organisasi' => 'Unit Kegiatan Mahasiswa Seni',
                'singkatan' => 'UKM Seni',
                'periode_kepengurusan' => '2026/2027',
                'dosen_pembimbing' => 'Siti Aminah, M.Sn.',
                'email_organisasi' => 'seni@campus.ac.id',
                'nomor_kontak' => '081234567892',
                'visi' => 'Wadah pelestarian budaya dan pengembangan kesenian kampus.',
                'misi' => 'Mengadakan pelatihan berkala dan pameran seni mahasiswa.',
                'struktur_organisasi' => 'struktur_seni.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_organisasi' => 4,
                'nama_organisasi' => 'Unit Kegiatan Olahraga',
                'singkatan' => 'UKM Olahraga',
                'periode_kepengurusan' => '2026/2027',
                'dosen_pembimbing' => 'Ahmad Hidayat, M.Pd.',
                'email_organisasi' => 'olahraga@campus.ac.id',
                'nomor_kontak' => '081234567893',
                'visi' => 'Membangun jiwa sportifitas dan prestasi olahraga mahasiswa.',
                'misi' => 'Memfasilitasi latihan rutin dan kompetisi antar fakultas.',
                'struktur_organisasi' => 'struktur_olahraga.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_organisasi' => 5,
                'nama_organisasi' => 'Paduan Suara Mahasiswa',
                'singkatan' => 'PSM',
                'periode_kepengurusan' => '2026/2027',
                'dosen_pembimbing' => 'Rini Handayani, M.Mus.',
                'email_organisasi' => 'psm@campus.ac.id',
                'nomor_kontak' => '081234567894',
                'visi' => 'Menghasikan paduan suara yang harmonis dan berprestasi nasional.',
                'misi' => 'Mengembangkan teknik vokal kelompok secara profesional.',
                'struktur_organisasi' => 'struktur_psm.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_organisasi' => 6,
                'nama_organisasi' => 'Komunitas Developer Kampus',
                'singkatan' => 'KDK',
                'periode_kepengurusan' => '2026/2027',
                'dosen_pembimbing' => 'I Putu Restu, M.T.',
                'email_organisasi' => 'developer@campus.ac.id',
                'nomor_kontak' => '081234567895',
                'visi' => 'Mencetak talenta digital siap kerja di bidang rekayasa perangkat lunak.',
                'misi' => 'Menyelenggarakan bootcamp coding dan pengerjaan projek riil.',
                'struktur_organisasi' => 'struktur_kdk.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}