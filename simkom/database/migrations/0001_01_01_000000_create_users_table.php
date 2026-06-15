<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Tabel Utama Users sesuai Dokumen SIMKOM
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user'); // Primary Key kustom sesuai Kamus Data kalian
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            
            // Pilihan role lengkap sesuai kebutuhan kelompok
            $table->enum('role', ['admin', 'pengurus', 'anggota', 'pembina'])->default('anggota');
            
            $table->string('status_akun')->default('aktif');
            $table->timestamps();
        });

        // 2. Tabel Token Reset Password (Bantuan bawaan Laravel agar tidak error)
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // 3. Tabel Sesi Login (Bantuan bawaan Laravel)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};