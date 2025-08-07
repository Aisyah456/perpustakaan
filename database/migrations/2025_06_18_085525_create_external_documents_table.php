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
        Schema::create('external_documents', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kategori'); // Contoh: Jurnal, Publikasi, Buku, dll
            $table->text('deskripsi')->nullable();
            $table->string('link'); // link eksternal (Google Drive, URL PDF, dll)
            $table->timestamps();

            // Indexes for better performance
            $table->index('kategori');
            $table->index('created_at');
            $table->index(['kategori', 'created_at']);
            $table->index('judul');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_documents');
    }
};
