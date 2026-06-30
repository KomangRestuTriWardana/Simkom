<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    protected $table = 'organisasis';
    protected $primaryKey = 'id_organisasi';

    protected $fillable = [
        'nama_organisasi',
        'singkatan',
        'periode_kepengurusan',
        'dosen_pembimbing',
        'email_organisasi',
        'nomor_kontak',
        'visi',
        'misi',
        'struktur_organisasi',
        'status', // Menambahkan kolom status agar bisa diisi (CRUD)
    ];
}