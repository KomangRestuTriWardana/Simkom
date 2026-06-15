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
         Schema::create('anggotas', function (Blueprint $table) {
        $table->id('id_anggota'); // a)
        $table->unsignedBigInteger('id_organisasi'); // b)
        $table->string('nim_anggota'); // c)
        $table->string('nama_anggota'); // d)
        $table->string('program_studi'); // e)
        $table->string('angkatan'); // f)
        $table->string('nomor_hp'); // g)
        $table->text('alamat'); // h)
        $table->string('status_anggota')->default('pending'); // i)
        $table->date('tanggal_bergabung'); // j)
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
