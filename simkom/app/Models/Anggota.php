<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [
   'id_organisasi', 
    'nim_anggota', 
    'nama_anggota', 
    'program_studi', 
    'angkatan', 
    'nomor_hp', 
    'alamat', 
    'status_anggota', 
    'tanggal_bergabung',
    'motivasi', 
    'dokumen_pendukung'
];

    protected $primaryKey = 'id_anggota';
}
