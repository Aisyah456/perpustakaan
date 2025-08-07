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
        Schema::create('booking_facility', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->string('nim')->nullable(); // jika pemesan bukan mahasiswa, bisa dikosongkan
            $table->enum('status_pemesan', ['mahasiswa', 'dosen', 'staff', 'umum']);
            $table->string('fakultas')->nullable(); // jika relevan
            $table->string('program_studi')->nullable(); // jika relevan

            $table->string('nama_fasilitas'); // contoh: Ruang Diskusi, Aula, Ruang Seminar
            $table->date('tanggal_pemakaian');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->text('keperluan');

            $table->enum('status_verifikasi', ['pending', 'disetujui', 'ditolak'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_facility');
    }
};
