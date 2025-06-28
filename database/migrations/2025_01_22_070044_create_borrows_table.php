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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // ID Mahasiswa
            $table->unsignedBigInteger('book_id');    // ID Buku
            $table->date('borrow_date');             // Tanggal Peminjaman
            $table->date('return_date')->nullable(); // Tanggal Pengembalian
            $table->timestamps();

            // Relasi
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
