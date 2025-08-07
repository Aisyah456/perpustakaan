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
        Schema::create('agenda_libraries', function (Blueprint $table) {
            $table->id();
            $table->string('judul');                 // Judul agenda
            $table->text('deskripsi');               // Deskripsi acara
            $table->string('tempat');                // Lokasi acara
            $table->date('tanggal_mulai');           // Tanggal mulai
            $table->date('tanggal_selesai')->nullable(); // Tanggal selesai (opsional)
            $table->string('jam')->nullable();       // Jam acara (misalnya 09:00 - 12:00)
            $table->string('penyelenggara')->nullable(); // Penyelenggara acara
            $table->string('poster')->nullable();    // Gambar poster
            $table->enum('status', ['draft', 'publish'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda_libraries');
    }
};
