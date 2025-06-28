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
        Schema::create('clearances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // ID Mahasiswa
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending'); // Status Bebas Pustaka
            $table->string('remarks')->nullable(); // Catatan Admin
            $table->unsignedBigInteger('admin_id'); // ID Admin yang memproses
            $table->timestamps();

            // Relasi
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade'); // Relasi ke tabel `users` untuk admin
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clearances');
    }
};
