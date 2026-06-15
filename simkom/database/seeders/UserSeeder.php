<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Memanggil model User yang benar
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Akun Admin
        User::create([
            'nama' => 'Budi Santoso',
            'username' => 'admin',
            'email' => 'budi.santoso@staff.univ.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'status_akun' => 'aktif'
        ]);

        // 2. Akun Pengurus
        User::create([
            'nama' => 'Siti Rahayu',
            'username' => 'pengurus',
            'email' => 'siti.rahayu@student.univ.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'pengurus',
            'status_akun' => 'aktif'
        ]);

        // 3. Akun Anggota (Mahasiswa) 
        // 3. Akun Mahasiswa (Tambahkan ini di bawah akun Siti Rahayu)
            User::create([
            'nama' => 'Ahmad Fauzi',
    'username' => 'mahasiswa',
    'email' => 'ahmad.fauzi@campus.ac.id',
    'password' => Hash::make('password123'),
    'role' => 'anggota', // GANTI 'mahasiswa' JADI 'anggota'
    'status_akun' => 'aktif'
        ]);

        // 4. Akun Pembina Organisasi (Tambahan Baru)
        User::create([
            'nama' => 'Hendra Wijaya',
            'username' => 'pembina',
            'email' => 'hendra.wijaya@staff.univ.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'pembina',
            'status_akun' => 'aktif'
        ]);
    }
}