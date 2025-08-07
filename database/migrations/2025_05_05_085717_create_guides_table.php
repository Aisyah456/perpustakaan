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
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->string('title');              // Judul panduan
            $table->text('description')->nullable(); // Deskripsi singkat
            $table->string('file_path')->nullable(); // Path file (PDF, DOC, dsb)
            $table->string('category')->nullable();  // Kategori (Umum, Sirkulasi, Referensi, dll)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};
