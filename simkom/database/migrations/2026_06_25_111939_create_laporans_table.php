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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->string('jenis_laporan'); // Contoh: Laporan Keuangan Bulanan, Laporan Tahunan
            $table->date('tanggal_generate_laporan');
            $table->string('format_file_laporan', 10); // Contoh: pdf, xlsx, csv
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
