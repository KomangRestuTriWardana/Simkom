<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    // Nama tabel di database
    protected $table = 'kegiatans';

    // Primary key custom karena kita pakai 'id_kegiatan'
    protected $primaryKey = 'id_kegiatan';

    // Kolom-kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'id_organisasi',
        'nama_kegiatan',
        'deskripsi_kegiatan',
        'tanggal_kegiatan',
        'lokasi_kegiatan',
        'kuota_peserta',
        'status_kegiatan'
    ];
    // Jika nanti kamu ingin menghubungkan ke tabel organisasi, bisa tambah relasi di sini
    // public function organisasi() {
    //     return $this->belongsTo(Organisasi::class, 'id_organisasi');
    // }
}
