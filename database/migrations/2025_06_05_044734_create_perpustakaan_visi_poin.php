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
        Schema::create('perpustakaan_visi_poin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visi_id')->constrained('perpustakaan_visi')->onDelete('cascade');
            $table->integer('nomor');
            $table->text('deskripsi');
            $table->boolean('is_active')->default(true);
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perpustakaan_visi_poin');
    }
};
