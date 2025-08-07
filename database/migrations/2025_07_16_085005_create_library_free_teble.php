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
        Schema::create('library_free_teble', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim')->unique();

            // foreign keys
            $table->foreignId('faculty_id')->constrained('faculties')->onDelete('cascade');
            $table->foreignId('major_id')->constrained('majors')->onDelete('cascade');

            $table->string('no_hp');
            $table->string('email');
            $table->string('jenjang'); // D3, S1, S2
            $table->string('keperluan'); // Wisuda, Yudisium, dll

            $table->string('file_karya_ilmiah'); // file PDF
            $table->string('scan_ktm');
            $table->string('bukti_upload')->nullable();

            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library_free_teble');
    }
};
