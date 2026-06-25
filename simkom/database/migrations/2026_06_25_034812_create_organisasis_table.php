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
        Schema::create('organisasis', function (Blueprint $table) {
            $table->id('id_organisasi');
            $table->string('nama_organisasi');
            $table->string('singkatan', 20);
            $table->string('periode_kepengurusan', 9); // Contoh: 2024/2025
            $table->string('dosen_pembimbing');
            $table->string('email_organisasi');
            $table->string('nomor_kontak', 20);
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('struktur_organisasi')->nullable(); // Menyimpan path file PDF atau PNG struktur
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisasis');
    }
};
