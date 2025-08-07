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
        Schema::create('library_organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama jabatan atau personel
            $table->string('position'); // Jabatan (misal: Kepala UPT)
            $table->unsignedBigInteger('parent_id')->nullable(); // Untuk hierarki
            $table->integer('level'); // Level struktur: 1-4
            $table->string('photo')->nullable(); // opsional: foto orang tsb
            $table->text('description')->nullable(); // keterangan tambahan
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('library_organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library_organizations');
    }
};
