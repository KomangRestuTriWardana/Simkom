<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\ProfilPengguna;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $incrementing = true; // Penting agar Laravel tahu ini auto-increment
    protected $keyType = 'int';   // Penting karena id_user adalah bigint/integer

    protected $fillable = [
        'nama',
        'username',
        'email',
        'password',
        'role',
        'status_akun',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    // TAMBAHKAN DI SINI
    // public function getAuthIdentifierName()
    // {
    //     return 'username';
    // }
    public function profil()
    {
        return $this->hasOne(ProfilPengguna::class, 'user_id');
    }
    
}