<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranKegiatan extends Model
{
    protected $table = 'pendaftaran_kegiatans';
    protected $fillable = ['id_user', 'id_kegiatan', 'nama_lengkap','nim', 'nomor_hp', 'motivasi', 'status','tanggal_daftar'];
}
