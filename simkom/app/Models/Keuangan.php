<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = 'keuangans';
    protected $primaryKey = 'id_keuangan';
    protected $fillable = [
        'jenis_transaksi',
        'keterangan',
        'jumlah',
        'tanggal',
        'kategori',
        'upload_bukti',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah' => 'float',
    ];
}
