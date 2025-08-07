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
        Schema::create('turnitin_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim_nidn');
            $table->string('email');
            $table->string('fakultas_prodi');
            $table->string('judul_naskah');
            $table->enum('jenis_dokumen', ['Skripsi', 'Tesis', 'Artikel', 'Lainnya']);
            $table->string('file');
            $table->text('catatan_pengguna')->nullable();
            $table->enum('status', ['pending', 'diproses', 'selesai', 'ditolak'])->default('pending');
            $table->string('hasil_turnitin')->nullable();
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnitin_requests');
    }
};
