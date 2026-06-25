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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id('id_dokumen'); // Primary Key
            $table->unsignedBigInteger('id_kegiatan')->nullable(); // Foreign key ke tabel kegiatan jika ada
            $table->string('nama_dokumen');
            $table->enum('jenis_dokumen', ['Proposal', 'LPJ', 'Laporan']);
            $table->string('nama_file');
            $table->date('tanggal_upload');
            $table->string('status_dokumen'); // contoh: Disetujui, Revisi, Pending
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
