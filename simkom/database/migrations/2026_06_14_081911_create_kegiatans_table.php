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
        Schema::create('kegiatans', function (Blueprint $table) {
        $table->id('id_kegiatan');
        $table->unsignedBigInteger('id_organisasi'); // Foreign key ke tabel organisasi
        $table->string('nama_kegiatan');
        $table->text('deskripsi_kegiatan'); // Menggunakan text untuk deskripsi panjang
        $table->date('tanggal_kegiatan');
        $table->string('lokasi_kegiatan');
        $table->integer('kuota_peserta');
        $table->string('status_kegiatan'); // Contoh: 'terbuka', 'penuh', 'ditutup'
        $table->timestamps();
        });     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
