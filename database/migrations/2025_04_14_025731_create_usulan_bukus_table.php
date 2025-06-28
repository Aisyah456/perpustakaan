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
        Schema::create('usulan_bukus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengusul');
            $table->enum('status', ['mahasiswa', 'dosen']);
            $table->string('judul_buku');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->text('alasan');
            $table->enum('verifikasi', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usulan_bukus');
    }
};
