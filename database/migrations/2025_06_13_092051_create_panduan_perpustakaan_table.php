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
        Schema::create('panduan_perpustakaan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi'); // Perbaikan di sini, dari 'test' menjadi 'text'
            $table->string('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panduan_perpustakaan');
    }
};
