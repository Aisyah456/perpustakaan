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
        Schema::create('information_literacies', function (Blueprint $table) {
            $table->id();
            $table->string('judul_pelatihan'); // Nama pelatihan
            $table->text('deskripsi'); // Penjelasan tentang pelatihan
            $table->string('narasumber'); // Nama pembicara / pemateri
            $table->date('tanggal'); // Tanggal pelatihan
            $table->string('waktu'); // Contoh: 09.00 - 11.00
            $table->string('lokasi'); // Ruangan atau via Zoom, dll
            $table->string('link_pendaftaran')->nullable(); // Jika ada form online
            $table->string('poster')->nullable(); // Upload gambar poster
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information_literacies');
    }
};
