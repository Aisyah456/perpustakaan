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
        Schema::create('portal_jurnal_nasional', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // misal: Sinta Kemendikbud, Portal Garuda, dsb
            $table->string('url')->nullable(); // jika ingin arahkan ke link
            $table->text('deskripsi')->nullable(); // deskripsi portal jurnal
            $table->boolean('is_active')->default(true); // status aktif/tidak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portal_jurnal_nasional');
    }
};
