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
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id('id_keuangan');
            $table->enum('jenis_transaksi', ['Pemasukan', 'Pengeluaran']);
            $table->text('keterangan');
            $table->decimal('jumlah', 15, 2); // Menggunakan decimal untuk nominal mata uang (RP)
            $table->date('tanggal');
            $table->string('kategori'); // Kegiatan / Operasional / Iuran...
            $table->string('upload_bukti')->nullable(); // Opsional untuk menyimpan nama/path file struk/nota
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangans');
    }
};
