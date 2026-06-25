<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporans';
    protected $primaryKey = 'id_laporan';
    protected $fillable = [
        'jenis_laporan',
        'tanggal_generate_laporan',
        'format_file_laporan',
    ];

    protected $casts = [
        'tanggal_generate_laporan' => 'date',
    ];
}
