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
        Schema::create('ask_librarians', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama penanya
            $table->string('email'); // Email penanya
            $table->string('fakultas'); // Fakultas penanya
            $table->string('prodi'); // Program studi penanya
            $table->string('kategori'); // Contoh: layanan, koleksi, teknis, dll
            $table->text('pertanyaan'); // Isi pertanyaan
            $table->text('jawaban')->nullable(); // Jawaban dari pustakawan
            $table->enum('status', ['pending', 'dijawab'])->default('pending'); // Status jawaban
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ask_librarians');
    }
};
