<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilPengguna extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nomor_hp',
        'nim',
        'program_studi',
        'jabatan',
        'nip'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
