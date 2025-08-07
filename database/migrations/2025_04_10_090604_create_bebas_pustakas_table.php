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
        Schema::create('bebas_pustakas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('prodi');
            $table->string('email');
            $table->string('kontak');

            // Pilihan tugas akhir
            $table->enum('kategori_tugas_akhir', ['KTI', 'Skripsi', 'Tesis', 'Disertasi']);

            // Keperluan Bebas Pustaka
            $table->enum('keperluan_bebas_pustaka', [
                'Yudisium D3-S3 & Profesi Ners',
                'Yudisium Profesi Non Ners',
                'Cuti Kuliah',
                'Pindah Kuliah',
                'Mengundurkan Diri',
                'Penutupan Publikasi'
            ]);

            // File
            $table->string('file_path')->nullable();              // File tugas akhir
            $table->string('artikel_jurnal_path')->nullable();    // File artikel jurnal

            // Status proses
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bebas_pustakas');
    }
};
