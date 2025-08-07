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
        Schema::create('literasi_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peserta');
            $table->string('nim_nip');
            $table->string('email');

            // Foreign key ke fakultas & program studi
            $table->foreignId('faculty_id')->constrained('faculties')->onDelete('cascade');
            $table->foreignId('program_id')->constrained('programs')->onDelete('cascade');

            $table->string('instansi')->nullable();
            $table->enum('jenis_pelatihan', [
                'Literasi Informasi',
                'E-Resources',
                'Turnitin',
                'Manajemen Referensi'
            ]);
            $table->date('tanggal_pelatihan');
            $table->text('catatan')->nullable();
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('literasi_trainings');
    }
};
