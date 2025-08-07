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
        Schema::create('internal_documents', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kategori'); // SOP, Panduan, Memo, dll.
            $table->text('deskripsi')->nullable();
            $table->string('file'); // path file dokumen
            $table->timestamps();

            // Indexes for better performance
            $table->index('kategori');
            $table->index('created_at');
            $table->index(['kategori', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internal_documents');
    }
};
