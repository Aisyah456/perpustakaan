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
        Schema::create('latest_collections', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // Judul koleksi
            $table->string('penulis')->nullable(); // Nama penulis
            $table->string('penerbit')->nullable(); // Nama penerbit
            $table->year('tahun_terbit')->nullable(); // Tahun terbit
            $table->string('kategori'); // Buku, Jurnal, E-Book, dll
            $table->text('deskripsi')->nullable(); // Deskripsi koleksi
            $table->string('cover')->nullable(); // Path file cover
            $table->string('file')->nullable(); // Path file ebook/pdf jika ada
            $table->string('link')->nullable(); // Link eksternal atau katalog
            $table->date('tanggal_masuk')->default(now()); // Tanggal masuk ke perpustakaan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('latest_collections');
    }
};
