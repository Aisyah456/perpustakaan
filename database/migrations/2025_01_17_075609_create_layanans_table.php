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
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('img'); // Untuk menyimpan path atau URL gambar
            $table->string('name');  // Untuk menyimpan nama layanan
            $table->text('deskripsi'); // Untuk menyimpan judul layanan
            $table->string('url');   // Untuk menyimpan URL terkait layanan
            $table->timestamps();    // Menyediakan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
