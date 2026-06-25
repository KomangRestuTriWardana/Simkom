<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumens';
    protected $primaryKey = 'id_dokumen';
    protected $fillable = [
        'id_kegiatan',
        'nama_dokumen',
        'jenis_dokumen',
        'nama_file',
        'tanggal_upload',
        'status_dokumen',
    ];

    protected $casts = [
        'tanggal_upload' => 'date',
    ];
}
