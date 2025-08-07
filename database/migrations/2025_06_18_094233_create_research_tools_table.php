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
        Schema::create('research_tools', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kategori'); // contoh: Referensi, Plagiarisme, Sitasi
            $table->text('deskripsi')->nullable();
            $table->string('link'); // link eksternal ke tools
            $table->string('ikon')->nullable(); // ikon opsional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_tools');
    }
};
