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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Nama partner (jika ingin disimpan)
            $table->string('link')->nullable(); // Link saat diklik
            $table->string('logo')->nullable(); // logo utama
            $table->string('hover_logo')->nullable(); // logo saat hover
            $table->string('background_image')->nullable(); // gambar background partner
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
